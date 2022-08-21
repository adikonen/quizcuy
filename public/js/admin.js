document.addEventListener("click", async (e) => {
    console.log(e.target);
    if(e.target.classList.contains('del-btn')){
      Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data ini akan dihapus dan Anda tidak akan bisa memulihkannya kembali!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#fa4444',
        confirmButtonText: "Hapus"
      }).then(({isConfirmed}) => {
        if(isConfirmed){
          console.log('jalan');
          console.log(e.target.parentElement);
          e.target.parentElement.submit();
        }
        else {
          Swal.fire("Data ini tidak jadi dihapus!");
        }
      })
    }

    if(e.target.classList.contains("search-btn")){
      console.log('jalan mas!');
      searchInput.submit();
    }
})

