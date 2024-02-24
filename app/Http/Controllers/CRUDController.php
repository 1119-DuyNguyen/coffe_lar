<?php

namespace App\Http\Controllers;

use App\Traits\InputHandlerTrait;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


abstract class CRUDController extends Controller
{
    //

    use InputHandlerTrait;

    /**
     * cru= create, update, read
     * @return string Đường dẫn tới view của cru resource
     *
     * @example folder views/a/b/cru.blade.php => return a.b
     */
    abstract protected function CRUDViewPath(): string;

    /** Trả về class của model
     * @return string
     */
    abstract protected function model(): string;

    /**
     * Lấy tên route cho store và update resource
     * @return string
     */
    abstract protected function getNameRouteCRU(): string;

    /**
     * Function lấy data dành cho resource route (edit)
     * @param $resource
     * @return mixed
     */
    protected function getEditResourceDataRoute($resource): array
    {
        return [$resource->id];
    }

    /**
     * Function lấy data dành cho resource route (create,edit)
     *
     * @return array
     */
    protected function getExtraDataRoute(): array
    {
        return [];
    }


    /**
     * @return array [
     * @type array formElements Trả về các mảng input elements
     * [
     * @type string type loại input
     * @example  text(one-line input) , textfield (multi line input), select, checkbox, ... etc
     * @type string name tên input
     * @type function value giá trị của input khi edit
     * @example  function( $resource ) { return $resource->name ; }
     *
     * @type string class css của input
     * @type string label label của thẻ input
     *
     * @type array optionValues chứa giá trị của các option gồm key và label
     * @type string optionKey
     * @type string optionLabel
     * @example <option value="optionValues[optionKey]"> optionValues[optionLabel] </option>
     * ]
     * ]
     *
     */
    abstract protected function getFormElements(): array;

    protected function getFormElemntsWithAutoParameters($resource = null): array
    {
        $formElements = $this->getFormElements() ?? [];
        if (empty($resource)) {
            foreach ($formElements as $key => $formElement) {
                $formElements[$key]['value'] = "";
            }
        } else {
            foreach ($formElements as $key => $formElement) {
                if (isset($formElement['value']) && is_callable($formElement['value'])) {
                    $formElements[$key]['value'] = $formElement['value']($resource) ?? "";
                } else {
                    $formElements[$key]['value'] = $resource->{$formElement['name']} ?? "";
                }
            }
        }

        return $formElements;
    }

    protected function unsetUpdateEmptyField(): array
    {
        return [];
    }

    /**    Display a listing of the resource.
     */
    public function index()
    {
        return view($this->CRUDViewPath() . '.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resource = $this->show($id);
        $method = 'PUT';
        $formElements = $this->getFormElemntsWithAutoParameters($resource) ?? [];
        $routeCRU = route(
            $this->getNameRouteCRU() . '.update',
            [...$this->getEditResourceDataRoute($resource), ...$this->getExtraDataRoute()]
        );
        return view($this->CRUDViewPath() . '.cru', compact('resource', 'method', 'formElements', 'routeCRU'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $method = "POST";
        $routeCRU = route($this->getNameRouteCRU() . '.store', $this->getExtraDataRoute());

        $formElements = $this->getFormElemntsWithAutoParameters() ?? [];
        return view($this->CRUDViewPath() . '.cru', compact('method', 'formElements', 'routeCRU'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->handleDataInput($request);

        $this->model()::create($data);
        //        toast()->success('Created Successfully!');
        toast()->success('Khởi tạo dữ liệu thành công');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($resource_id)
    {
        return $this->model()::findOrFail($resource_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $resource_id)
    {
        try {
            $resource = $this->model()::findOrFail($resource_id);

            $data = $this->handleDataInput(
                $request,
                !empty($this->getImageInput())
                    ? $resource->{$this->getImageInput()}
                    : null
            );
            foreach ($this->unsetUpdateEmptyField() as $field) {
                if (empty($data[$field])) {
                    unset($data[$field]);
                }
            }
            $resource->fill($data);
            $resource->save();

            toast()->success('Cập nhập dữ liệu thành công!');
        } catch (ValidationException $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        } catch (Exception $e) {
        }


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($resource_id)
    {
        $resource = $this->model()::findOrFail($resource_id);

        try {
            if ($this->getImageInput() && $resource->{$this->getImageInput()}) {
                {
                    $imagePath = $this->getImageInput();
                }
            }
            $resource->delete();

            if (isset($imagePath)) {
                $this->deleteImage($resource->{$this->getImageInput()});
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1451') {
                return response(['status' => 'error', 'message' => 'Không thể xóa do sản phẩm có ràng buộc']);
            }
        } catch (ValidationException $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => "lỗi máy chủ, không thể thực hiện"]);
        }

        return response(['status' => 'success', 'message' => 'Xóa thành công!']);
    }

    public function changeStatus(Request $request)
    {
        $resource = $this->model()::findOrFail($request->input('id'));
        $resource->status = $request->input('status') === 'true' ? 1 : 0;
        $resource->save();

        return response(['message' => __('Status has been updated!')]);
    }
}
