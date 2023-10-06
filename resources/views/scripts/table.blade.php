<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.2.0/js/dataTables.scroller.min.js"></script>
<script>
    new DataTable('#example', {
        ajax: function (data, callback, settings) {
            let out = [];

            for (var i = data.start, ien = data.start + data.length; i < ien; i++) {
                out.push([i + '-1', i + '-2', i + '-3', i + '-4', i + '-5']);
            }

            setTimeout(() => {
                callback({
                    draw: data.draw,
                    data: out,
                    recordsTotal: 5000000,
                    recordsFiltered: 5000000
                });
            }, 50);
        },
        ordering: false,
        scroller: {
            loadingIndicator: true
        },
        scrollY: 880,
        searching: false,
        serverSide: true
    });
</script>
