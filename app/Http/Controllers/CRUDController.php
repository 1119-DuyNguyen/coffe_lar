<?php

namespace App\Http\Controllers;

use App\Traits\InputHandlerTrait;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

abstract class CRUDController extends Controller
{
    //

    use InputHandlerTrait;
    abstract protected function CRUDViewPath(): string;
    abstract protected function model(): string;
    protected function unsetUpdateEmptyField(): array
    {
        return [];
    }

    /**
     * Display a listing of the resource.
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
        $method= 'PUT';
        return view($this->CRUDViewPath() . '.cru', compact('resource', $method));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $method= "POST";
        return view($this->CRUDViewPath() . '.cru', compact($method));
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
        $resource->update($data);
        toast()->success('Cập nhập dữ liệu thành công!');


        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($resource_id)
    {
        $resource = $this->model()::findOrFail($resource_id);

        try {
            if ($this->getImageInput() && $resource->{$this->getImageInput()}) { {
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
        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => "lỗi máy chủ, không thể thực hiện"]);
        }

        return response(['status' => 'success', 'message' => 'Xóa thành công!']);
    }

    public function changeStatus(Request $request)
    {
        $resource = $this->model()::findOrFail($request->input('id'));
        $resource->status = $request->input('status') == 'true' ? 1 : 0;
        $resource->save();

        return response(['message' => __('Status has been updated!')]);
    }
}
