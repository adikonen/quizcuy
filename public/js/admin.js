document.addEventListener("click", async (e) => {

    if(e.target.classList.contains('del-btn')){
      Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Akun ini akan dihapus dan Anda tidak akan bisa memulihkannya kembali!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#fa4444',
        confirmButtonText: "Hapus"
      }).then(({isConfirmed}) => {
        if(isConfirmed){
          e.target.parentElement.submit();
        }
        else {
          Swal.fire("Akun ini tidak jadi dihapus!");
        }
      })
    }

    if(e.target.classList.contains("search-btn")){
      console.log('jalan mas!');
      searchInput.submit();
    }
})

