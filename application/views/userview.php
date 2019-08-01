<section class="content-header">
    <h1>Data Admin</h1>
</section>
            
<section class="content">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Admin</h3>
                    <div class="box-tools pull-right">
                        <a href="<?=base_url()?>admin/add"  class="btn btn-success btn-sm">Tambah Admin</a>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>

                </div>
                <div class="box-body" style="overflow-x:auto;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row"><div class="col-md-6" id="notif"><?=@$message?></div></div>
                            <table id="DataTableChild" class="table table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Admin</th>
                                        <th>Nama Admin</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        $.fn.DataTable.ext.pager.numbers_length = 7;
        var table = $('#DataTableChild').DataTable( {
            paging          : true,
            lengthChange    : true,
            searching       : true,
            ordering        : true,
            info            : true,
            autoWidth       : true,
            // iDisplayLength  : 5,
            ajax : '<?=base_url()?>admin/list_admin'
            // columns: [{
            //         className:      'details-control',
            //         data:           null,
            //         defaultContent: ''
            //     },
            //     {data: "no"},
            //     {data: "kode"},
            //     {data: "jabatan"},
            //     {data: "kuota"},
            //     {data: "pelamar"},
            //     {data: "status"},
            //     {data: "opsi"},
            // ],
        });
    });

    function deleteData(id='',val='') {
        var txt;
        var r = confirm("Anda yakin ingin menghapus data "+val+"?");
        if (r == true) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>admin/delete/',
                data: {
                    id : id,
                },
                success: function(data){

                    location.reload();

                },
                error: function() {
                }
            });
            
        } else {
            return false;
        }
    }
</script>