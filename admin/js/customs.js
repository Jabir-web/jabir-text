$(document).ready(function () {
 
    $("#signup").click(function () {
        $('#signupform').validate({ // initialize the plugin
            rules: {
                user_fname: {
                    required: true,
                    minlength: 5,
                    maxlength: 15,
                    
                },
                user_number:{
                    required: true,
                    number: true,
                    maxlength:11,
                    minlength:11,
                },
                user_email:{
                    required: true,
                    email: true,
    
                },
                user_password:{
                    required: true,
                    minlength: 8,
    
                },
                userconfirm_password:{
                    required: true,
                    equalTo: '[name="user_password"]',
                }
              
            },
            messages:{
                user_fname:{
                    required: "Field is required", 
                }
            },
            
            
            
        });
        form.submit();
    })
  

    $("#servicebtn").click(function () {
        $('#serviceform').validate({ // initialize the plugin
            rules: {
                service_name: {
                    required: true,
                    minlength: 5,
                    
                    
                },
                service_fee:{
                    required: true,
                    number: true,
                    minlength:3,
                    
                },
              

               
              
            },
            messages:{
                service_name:{
                    required: "Field is required", 
                }
            },
            
            
            
        });
        form.submit();
    
    })


    
    $("#expbtn").click(function () {
        $('#expform').validate({ // initialize the plugin
            rules: {
                exp_name: {
                    required: true,
                    minlength: 5,
                    
                    
                },
                exp_amount:{
                    required: true,
                    number: true,
                    minlength:2,
                    
                },
               
              
            },
            messages:{
                service_name:{
                    required: "Field is required", 
                }
            },
            
            
            
        });
        form.submit();
    
    })

// bill validation 
$("#billbtn").click(function () {
    $('#billform').validate({ // initialize the plugin
        rules: {
            cus_name: {
                required: true,
                minlength: 3,
                
                
            },
            cus_phone:{
                required: true,
                number: true,
                minlength:11,
                maxlength:11,
                
            },
            
            
        },
        messages:{
            service_name:{
                required: "Field is required", 
            }
        },
            
        
        
    });
    form.submit();
    
})
// bill validation 


// package validations 

$("#packagebtn").click(function () {
    $('#packform').validate({ // initialize the plugin
        rules: {
            pack_name: {
                required: true,
                minlength: 5,
                
                
            },
            pack_fee:{
                required: true,
                number: true,
                minlength:3,
                                
            },
            
            
        },
        messages:{
            service_name:{
                required: "Field is required", 
            }
        },
            
        
        
    });
    form.submit();
    
})
// package validations 
// staffvalidations 

$("#staffbtn").click(function () {
    $('#staffform').validate({ // initialize the plugin
        rules: {
            staff_name: {
                required: true,
                minlength: 3,
                
                
            },
            staff_pnumber:{
                required: true,
                number: true,
                minlength:11,
                maxlength:11,
                                
            },
            staff_nic:{
                required: true,
                number: true,
            }
            
            
        },
        messages:{
            staff_name:{
                required: "Field is required", 
            }
        },
            
        
        
    });
    form.submit();
    
})
// staff validations 





});