function _open_menu() {
    $('.menu-bar-overall-div').animate({'margin-left':'0%'},200);
    $('.side-menu-bar').animate({'margin-left':'0px'},400);
}


function _close_menu() {
    $('.menu-bar-overall-div').animate({'margin-left':'-1000%'},400);
    $('.side-menu-bar').animate({'margin-left':'=2500px'},200);
}


function _get_panel(next_id){
    var message='Fill all necessary fields to continue';


    
    if ((next_id=='next-2')){

        //// declare the input for registration page 1 /////
        var Firstname= $('#Firstname').val();
        var Lastname= $('#Lastname').val();
        var Dateofbirth= $('#Dateofbirth').val();
        var Gender= $('#Gender').val();


   
        if ((Firstname=='') || (Lastname=='') || (Dateofbirth=='') || (Gender=='')){
            alert(message);

        }else{

            $('.next-div').hide();
            $('#'+next_id).fadeIn(1000);
        }

    }
   
    



    if (next_id=='next-3'){

        //// declare the input for registration page 2 /////
        var Email= $('#Email').val()
        var Residentialaddress = $('#Residentialaddress').val()
        var Phonenumber= $('#Phonenumber').val();
        var Createpassword= $('#Createpassword').val()
        var Confirmpassword= $('#Confirmpassword').val()

        if((Phonenumber=='') || (Email
            
           
            =='') || (Residentialaddress=='') || (Createpassword=='') || (Confirmpassword=='') ){
            alert(message);
        }else{
         $('.next-div').hide();
         $('#'+next_id).fadeIn(1000);
        }
    }  

}







////////////////////////// Next Panel Function////////////////////////
function _next_panel(next_id) {
    $('.next-div').hide();
    $('#'+next_id).fadeIn(1000);
}
/////////////////////////////////////////////////////////////////////

function triggerClick(){
    document.querySelector('#ImageSelector').click();
}

function displayImage(image){
    if (image.files[0]) {
        var reader = new FileReader();
        reader.onload= function(image){
            document.querySelector('#ImageDisplay').setAttribute('src', image.target.result);
        }
        reader.readAsDataURL(image.files[0]);
    }
}

function displayPassport(passport){
    if (passport.files[0]) {
        var reader = new FileReader();
        reader.onload= function(passport){
            document.querySelector('#ShowImage').setAttribute('src', passport.target.result);
        }
        reader.readAsDataURL(passport.files[0]);
    }
}