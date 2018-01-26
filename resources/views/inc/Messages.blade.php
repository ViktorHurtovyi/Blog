
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
@if(session()->has('success'))
    <script type="text/javascript">
    $(function(){
                  alertifуy.alert(" (!! session()->get('success')) !!) ");
    alertify.success("(!! session()->get('success')) !!) ");
    })
    </script>
    @elseif(session()->has('error'))
    <script type="text/javascript">
        $(function(){
            alertify.alert(" (!! session()->get('error')) !!) ");
            alertify.error("(!! session()->get('error')) !!) ");
        })
    </script>
@endif