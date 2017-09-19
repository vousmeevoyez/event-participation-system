 <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://github.com/vousmeevoyez">Kelvin</a> Light Dashboard Theme. All Right Reserved
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?=base_url('assets/admin/js/jquery-1.10.2.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/sweetalert/dist/sweetalert.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/admin/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/admin/js/custom.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/datatables/jquery.dataTables.min.js');?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "dom": '<lf<t>ip>'
        });

    } );
</script>
</html>