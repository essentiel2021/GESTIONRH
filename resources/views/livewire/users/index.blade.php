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


<script>
    window.addEventListener("showConfirmMessage", event=>{
        Swal.fire({
        title:event.detail.message.title,
        text: event.detail.message.text,
        icon:event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer',
        cancelButtonText: 'Annuler',
        }).then((result) => {
        if (result.isConfirmed) {
            if(event.detail.message.data){
                @this.deleteUser(event.detail.message.data.user_id)
            }
            @this.resetPassword()
        }
        })
    })
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 5000
                }
            )
    })
</script>

