<?php

namespace App\Traits;


use App\Http\Requests\ProfileRegisterRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait InputHandlerTrait
{
    use ImageUploadTrait;

    protected function addAutoInput(Request $request): array
    {
        return [];
    }

    /**
     *Get request input name and automatically transform to slug
     * @return string
     * @Annotation Model MUST have attribute 'slug'
     */
    protected function getInputSlug(): string
    {
        return '';
    }

    protected function getFormRequest(): string|null
    {
        return null;
    }

    protected function getImageInput(): string|null
    {
        return null;
    }

    protected function getImagePath(): string|null
    {
        return null;
    }

    protected function multipleImageInput(): array|null
    {
        return null;
    }

    /**
     * @param Request $request
     * @return array
     * validate(default), convert images from file to public path, automatically generate slug
     */
    protected function handleDataInput(Request $request, $oldPath = null)
    {

        $rawData = array_merge($request->all(), $this->addAutoInput($request));
        // transform slug
        if (!empty($this->getInputSlug())) {
            $rawData['slug'] = Str::slug($this->getInputSlug());
        }

        $this->validateRequest($rawData,$request);
        $storageImage = 'uploads/' . ($this->getImagePath() ?? "");
        // transform a image file
        $imagePath = $this->updateImage($request, $this->getImageInput(),
            $storageImage, $oldPath);

        if (isset($imagePath))
            $rawData[$this->getImageInput()] = $imagePath;

        return $rawData;
    }

    protected function validateRequest($data,$request)
    {

        $formRequest = $this->getFormRequest()::createFrom($request);
//        dd($formRequest->method(),$formRequest->rules());
        if (empty($formRequest)) return [];
        $rules = $formRequest->rules();

        if (!empty($this->getImageInput())) {
            $rules = array_merge(array(
                $this->getImageInput() => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
            ), $rules);
        }

        Validator::make(
            $data,
            $formRequest->rules(),
            $formRequest->messages()
        )->validate();

    }
}

