<div>
    @if($currentPage == PAGECREATEFORM)
         @include("livewire.users.create")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.users.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.users.list")
    @endif
</div>

