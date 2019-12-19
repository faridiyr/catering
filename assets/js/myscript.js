const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Data Pemesanan ',
        text: 'Berhasil ' + flashData,
        type: 'success'
    });
}

// tombol-hapus-pemesanan
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Data Pemesanan akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

//edit produk
const flashDataP = $('.flash-datap').data('flashdatap');

if (flashDataP) {
    Swal({
        title: 'Data Produk ',
        text: 'Berhasil ' + flashDataP,
        type: 'success'
    });
}
// tombol-hapus produk
$('.tombol-hapusp').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Data Produk akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});


// ------------------------------------------------USER--------------------------------------------------------
//edit user
const flashDataU = $('.flash-datau').data('flashdatau');

if (flashDataU) {
    Swal({
        title: 'Data User ',
        text: 'Berhasil ' + flashDataU,
        type: 'success'
    });
}
// tombol-hapus user
$('.tombol-hapusu').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Data User akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});
