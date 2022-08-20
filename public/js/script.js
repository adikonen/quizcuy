document.addEventListener("click", async (e) => {
  if (e.target.classList.contains("buy-btn")) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "mx-3 btn btn-success",
        cancelButton: "mx-3 btn btn-primary",
      },
      buttonsStyling: false,
    });

    swalWithBootstrapButtons
      .fire({
        title: "beli nyawa?",
        text: "point mu akan digunakan!",
        icon: "info",
        showCancelButton: true,
        confirmButtonText: "Ya, beli nyawa!",
        cancelButtonText: "Tidak!",
        reverseButtons: true,
      })
      .then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire("Success!", "Pembelian berhasil, nyawa mu telah bertambah!.", "success").then((res) => e.target.submit());
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire("Cancelled", "Pembelian dibatalkan :)", "error");
        }
      });
  }
});

document.addEventListener("click", async (e) => {
  if (e.target.classList.contains("money-btn")) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "mx-3 btn btn-success",
        cancelButton: "mx-3 btn btn-primary",
      },
      buttonsStyling: false,
    });

    swalWithBootstrapButtons
      .fire({
        title: "beli nyawa?",
        text: "saldo mu akan digunakan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, beli nyawa!",
        cancelButtonText: "Tidak!",
        reverseButtons: true,
      })
      .then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire("Success!", "Pembelian berhasil, Nyawa Mu Telah Bertambah!", "success");
          e.target.submit();
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire("Cancelled", "Pembelian dibatalkan :)", "error");
        }
      });
  }
});

// ~~~~~~~~~~~~CHOSE FILE NI CUK~~~~~~~~~~~~//

// const { value: file } = await Swal.fire({
//     title: 'Select image',
//     input: 'file',
//     inputAttributes: {
//       'accept': 'image/*',
//       'aria-label': 'Upload your profile picture'
//     }
//   })

//   if (file) {
//     const reader = new FileReader()
//     reader.onload = (e) => {
//       Swal.fire({
//         title: 'Your uploaded picture',
//         imageUrl: e.target.result,
//         imageAlt: 'The uploaded picture'
//       })
//     }
//     reader.readAsDataURL(file)
//   }
