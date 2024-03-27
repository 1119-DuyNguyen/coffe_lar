<div>

    <form wire:submit="{{(isset($this->receipt))? "edit" : "create"}}">
        <div class="form-group">

            {{ $this->form }}
        </div>


        <button type="submit" class="btn btn-primary">
            Thực hiện thao tác
        </button>
    </form>

    <x-filament-actions::modals/>
</div>
