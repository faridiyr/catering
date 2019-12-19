<footer class="bd-footer text-light bg-warning">
    <!-- <div class="container pt-3">
        <div class="row" style="text-align:left;">
            <div class="col-4">
                <h6>Tentang Kami</h6>
                <hr width=30%; color="white" align="left">
                <img src="img/footer/TA.png" alt="" width="200px">
                <p>Tirto Agung No. 45 </br> Pedalangan, Banyumanik.</p>
                <p><i class="fas fa-envelope"></i> tirtoagung45@undip.mail.ac.id</p>
                <p><i class="fas fa-phone-alt"></i> +628 3842 547 788</p>

            </div>
            <div class="col-4">
                <h6>Pusat Bantuan</h6>
                <hr width=30%; color="white" align="left">
                <p>Call Center</p>
                <p>Laporan Bug</p>
            </div>
            <div class="col-4">
                <h6>Lokasi Kami</h6>
                <hr width=30%; color="white" align="left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.8977747885517!2d110.42871402915083!3d-7.057237799681428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708eaa626b905b%3A0xf3971da36f99e6ee!2sJl.%20Tirto%20Agung%20No.45%2C%20Pedalangan%2C%20Kec.%20Banyumanik%2C%20Kota%20Semarang%2C%20Jawa%20Tengah%2050239!5e0!3m2!1sid!2sid!4v1571062813388!5m2!1sid!2sid" width="300" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div> -->
    <div class="footer-copyright text-center text-dark py-3">Copyright © <?php echo date('Y'); ?><a href="<?php echo base_url(); ?>"> CATERING-IN</a>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

</body>

</html>