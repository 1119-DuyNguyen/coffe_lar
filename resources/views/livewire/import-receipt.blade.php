<div>

    <form wire:submit="{{(isset($this->receipt))? "edit" : "create"}}">
        <div class="form-group">

            {{ $this->form }}
        </div>


        <button type="submit" class="btn btn-primary">
            {{(isset($this->receipt))? "Cập nhật" : "Khởi tạo"}}
        </button>
    </form>

    <x-filament-actions::modals/>
</div>
