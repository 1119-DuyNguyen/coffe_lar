<?php

namespace App\Traits;


use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait CrudTrait
{
    use InputHandlerTrait;

    abstract protected function model(): string;


    public function index()
    {
        return $this->model()::all();
    }

    public function store(Request $request)
    {
        $data = $this->handleDataInput($request);

        $this->model()::create($data);
        toast()->success('Created Successfully!');

        return redirect()->back();
    }

    public function show($resource_id)
    {
        return $this->model()::findOrFail($resource_id);
    }

    public function update(Request $request, $resource_id)
    {
        $resource = $this->model()::findOrFail($resource_id);
        $data = $this->handleDataInput(
            $request,
            !empty($this->getImageInput())
                ? $resource->{$this->getImageInput()}
                : null);

        $resource->fill($data)->save();
        toast()->success('Updated Successfully!');

        return redirect()->back();
    }

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
                return response(['status' => 'error', 'message' => 'This item contain relation can\'t delete it.']);
            }

        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => "Can't do this action. Please try again later !"]);
        }

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);

    }

    public function changeStatus(Request $request)
    {
        $resource = $this->model()::findOrFail($request->input('id'));
        $resource->status = $request->status == 'true' ? 1 : 0;
        $resource->save();

        return response(['message' => 'Status has been updated!']);
    }


}

