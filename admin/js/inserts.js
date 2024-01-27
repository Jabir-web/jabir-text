$(document).ready(function () {
    $("#adding").click(function () {
        $("#box").append(` <div class="row">
        <div class="col-11">
            <select id="servicebar" 
                class="form-control  form-select" >
                <option value="0" selected>Select Servcie.....</option>
                <option  ><?php echo $row['service_name']?> ---------- Rs: <?php echo $row['service_fee']?></option>
            </select>
        </div>
        <div class="col-1">
            <div class="btn btn-danger  text-center" id="subtract"><i class="menu-icon mdi mdi-minus text-center"></i></div>
        </div>
     
    </div>`)

    })

    $("#box").on("click","#subtract",function () {
        $(this).closest(".row").remove()
    })


    // package 
    $("#addingtwo").click(function () {
        $("#boxtwo").append(` <div class="row">
        <div class="col-11">
            <select id="packagebar" class="form-control  form-select" name="packagename"  required>
                <option value="0" selected>Select Package.....</option>
                <option></option>
              
            </select>
        </div>
        <div class="col-1">
            <div class="btn btn-success  text-center" id="addingtwo"><i
                    class="menu-icon mdi mdi-plus text-center"></i>
            </div>
        </div>

    </div>`)

    })

    $("#boxtwo").on("click","#subtracttwo",function () {
        $(this).closest(".row").remove()
    })


    // var start = 0;
    
    // $("#wo").val(start)

    $("#servicebar").change(function () {
       
        
        var sb = $('#servicebar option:selected').val();
        var pb = $('#packagebar option:selected').val();
        one=parseInt(sb.replace(/\D/g, ''));
        two=parseInt(pb.replace(/\D/g, ''));
        
        total=one+two
        $("#wo").val(total)
    })
    $("#packagebar").change(function () {
        
        var sb = $('#servicebar option:selected').val();
        var pb = $('#packagebar option:selected').val();
        one=parseInt(sb.replace(/\D/g, ''));
        two=parseInt(pb.replace(/\D/g, ''));
        
        total=one+two
        $("#wo").val(total)
    })
    
    
   
})



