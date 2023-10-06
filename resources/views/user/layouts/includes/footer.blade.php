</div>
<!-- /.card -->
</section>
</div>

<script src={{ asset('assets/plugins/jquery/jquery.min.js') }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset('assets/dist/js/adminlte.min.js') }}></script>
<!--Custom scripts-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@yield('js-script')
<script>
$('#myselect').on('change', function() {
$('#myinput').val($(this).val());
})

// init
$('#myselect').change();




function GetPrint()
{
    /*For Print*/
    window.print();
}

function BtnAdd()
{
    /*Add Button*/
    var v = $("#TRow").clone().appendTo("#TBody") ;
    $(v).find("input").val('');
    $(v).removeClass("d-none");
    $(v).find("th").first().html($('#TBody tr').length - 1);
}

function BtnDel(v)
{
    /*Delete Button*/
       $(v).parent().parent().remove();
       GetTotal();

        $("#TBody").find("tr").each(
        function(index)
        {
           $(this).find("th").first().html(index);
        }

       );
}

function Calc(v)
{
    /*Detail Calculation Each Row*/
    var index = $(v).parent().parent().index();

    var qty = document.getElementsByName("qty[]")[index].value;
    var rate = document.getElementsByName("rate[]")[index].value;

    var amt = qty * rate;
    document.getElementsByName("amt[]")[index].value = amt;

    GetTotal();
}

function GetTotal()
{
    /*Footer Calculation*/

    var sum=0;
    var amts =  document.getElementsByName("amt[]");

    for (let index = 0; index < amts.length; index++)
    {
        var amt = amts[index].value;
        sum = +(sum) +  +(amt) ;
    }

    document.getElementById("FTotal").value = sum;



}

</script>

{{-- This dependent dropdown javascript --}}
<script type="text/javascript">
    $(document).ready(function () {
                    $('#staff_name').on('change', function () {
                         let id = $(this).val();
                         $('#super_voiser').empty();
                         $('#super_voiser').append(`<input hidden  value="Processing..." >`);
                         $('#fack_name').append(`<input type="text"  value="Processing..." >`);
                          $.ajax({
                          type: 'GET',
                          url: 'get/' + id,
                          success: function (response) {
                         var response = JSON.parse(response);
                         console.log(response);

                         $('#super_voiser').empty();
                         response.forEach(element => {
                            $('#super_voiser').append(`<input hidden name="supervisor_name" value="${element['supervisor_name']}" ><input hidden name="supervisor_email" value="${element['supervisor_email']}" ><input hidden name="email" value="${element['email']}" >`);
                            $('#fack_name').empty();
                            $('#fack_name').append(`<input type="text" class="form-control"  @disabled(true) value="${element['name']}">`);

                        });
                       }
                   });
            });
        });
</script>


</body>

</html>
