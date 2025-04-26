(function (i, s, o, g, r, a, m) {

    i['GoogleAnalyticsObject'] = r;

    i[r] = i[r] || function () {

        (i[r].q = i[r].q || []).push(arguments)

    }, i[r].l = 1 * new Date();

    a = s.createElement(o),

            m = s.getElementsByTagName(o)[0];

    a.async = 1;

    a.src = g;

    m.parentNode.insertBefore(a, m)

})(window, document, 'script', '../../js/user/js/analytics.js', 'ga');



ga('create', 'UA-73239902-1', 'auto');

ga('send', 'pageview');





function showhide()

{

var div = document.getElementById("newpost");

if (div.style.display !== "none") {

div.style.display = "none";

} else {

div.style.display = "block";

}

}





function showhideDonor()

{

    var div = document.getElementById("Donor");

    var divhelper = document.getElementById("helper");

//           alert(divhelper.style.display != "none");

    if (div.style.display == "none" && divhelper.style.display == "none") {

        // div.style.display = "block";
        div.style.display = "none";

        divhelper.style.display = "none";

    } else if (div.style.display != "none") {

        // div.style.display = "block";
        div.style.display = "none";

        divhelper.style.display = "none";

    } else if (divhelper.style.display != "none") {

        divhelper.style.display = "none";

        // div.style.display = "block";
        div.style.display = "none";

    }

}

function showhidehelper()

{

    var div = document.getElementById("Donor");

    var divhelper = document.getElementById("helper");

    if (div.style.display == "none" || divhelper.style.display == "none") {

        div.style.display = "block";


        // divhelper.style.display = "block"; 
        divhelper.style.display = "none";

    }

}

function showtxtAnyOthermeans()
{
    var div = document.getElementById("txtAnyOthermeans");
    if (div.style.display !== "none") {
        div.style.display = "none";
    } 
    else {
        div.style.display = "none";
    }
}

function hidetxtAnyOthermeans()
{
    var radio = $('input[type=radio][name=donation_type]:checked').attr('id')
    var div = document.getElementById("txtAnyOthermeans");
    if(radio == 'any-other'){
        div.style.display = "block";
    }else{
        div.style.display = "none";
    }

}

function check_any_one(){
    var any_one = document.getElementById("any-one").checked;
    var div = document.getElementById("chkreadonly");
    var div1 = document.getElementById("chkreadonly1");
    var div2 = document.getElementById("chkreadonly2");

    var div3 = document.getElementById("chkreadonlyage");

    var div4 = document.getElementById("chkreadonlyage1");

    var div5 = document.getElementById("chkreadonlyage2");

    var div6 = document.getElementById("chkreadonlyage3");

    if(any_one == true){
        div.disabled = true;
        div1.disabled = true;
        div2.disabled = true;
        div3.disabled = true;
        div4.disabled = true;
        div5.disabled = true;
        div6.disabled = true;
        $(".disappear1").css('opacity',"0.5");
        $(".disappear1").css('opacity',"0.5");
        $(".disappear1").css('opacity',"0.5");
        $(".disappear2").css('opacity',"0.5");
        $(".disappear2").css('opacity',"0.5");
        $(".disappear2").css('opacity',"0.5");
        $("#gender").removeAttr('checked');
        $("#age").removeAttr('checked');
        $("#handicaped").removeAttr('checked');
    }
}

function checkHandicaped(){
    $("#any-one").removeAttr('checked');
}

function chkshow()

{

    var div = document.getElementById("chkreadonly");

    var div1 = document.getElementById("chkreadonly1");

    var div2 = document.getElementById("chkreadonly2");

    var any_one = document.getElementById("any-one").checked;

    if (div.disabled == true || div1.disabled == true || div2.disabled == true) {

        $("#any-one").removeAttr('checked');

        div.disabled = false;

        div1.disabled = false;

        div2.disabled = false;
        $(".disappear1").css('opacity',"");
        $(".disappear1").css('opacity',"");
        $(".disappear1").css('opacity',"");

    } else {
        $("#chkreadonly").removeAttr('checked');
        div.disabled = true;

        $("#chkreadonly1").removeAttr('checked');
        div1.disabled = true;

        $("#chkreadonly2").removeAttr('checked');
        div2.disabled = true;

        $(".disappear1").css('opacity',"0.5");
        $(".disappear1").css('opacity',"0.5");
        $(".disappear1").css('opacity',"0.5");

        $("#any-one").attr('checked','checked');

    }

}

function chkshowage()

{

    var div = document.getElementById("chkreadonlyage");

    var div1 = document.getElementById("chkreadonlyage1");

    var div2 = document.getElementById("chkreadonlyage2");

    var div3 = document.getElementById("chkreadonlyage3");

    if (div.disabled == true || div1.disabled == true || div2.disabled == true || div3.disabled == true) {

        div.disabled = false;

        div1.disabled = false;

        div2.disabled = false;

        div3.disabled = false;
        $(".disappear2").css('opacity',"");
        $(".disappear2").css('opacity',"");
        $(".disappear2").css('opacity',"");
        $(".disappear2").css('opacity',"");
        $("#any-one").removeAttr('checked');

    } else {

        $("#chkreadonlyage").removeAttr('checked');
        div.disabled = true;

        $("#chkreadonlyage1").removeAttr('checked');
        div1.disabled = true;

        $("#chkreadonlyage2").removeAttr('checked');
        div2.disabled = true;

        $("#chkreadonlyage3").removeAttr('checked');
        div3.disabled = true;
        $(".disappear2").css('opacity',"0.5");
        $(".disappear2").css('opacity',"0.5");
        $(".disappear2").css('opacity',"0.5");
        $(".disappear2").css('opacity',"0.5");

    }

}

function Monetary()

{

    var div = document.getElementById("txtMonetary");

    var div1 = document.getElementById("txtNonMonetary");

    if (div.style.display !== "none") {

        div.style.display = "block";
        $('#txtMonetary').attr('required', 'required');

    } else {

        div.style.display = "block";

        // div1.style.display = "none";
        $('#txtMonetary').attr('required', 'required');

    }

}

function NonMonetary()

{

    var div = document.getElementById("txtMonetary");

    var div1 = document.getElementById("txtNonMonetary");

    if (div1.style.display !== "none") {

        div1.style.display = "block";
        $('#txtNonMonetary').attr('required', 'required');


    } else {

        div.style.display = "none";

        div1.style.display = "block";
        $('#txtNonMonetary').attr('required', 'required');

    }

}

function Free()

{

    var div = document.getElementById("txtMonetary");

    // var div1 = document.getElementById("txtNonMonetary");

    if (div.style.display !== "none" || div1.style.display !== "none") {

        // div1.style.display = "none";

        div.style.display = "none";
        
        $('#txtNonMonetary').removeAttr('required');
        $('#txtMonetary').removeAttr('required');



    } else

    {

        div1.style.display = "none";

        div.style.display = "none";
        
        $('#txtNonMonetary').removeAttr('required');
        $('#txtMonetary').removeAttr('required');

    }

}

function showyes()

{

    var div = document.getElementById("txtReason");

    if (div.style.display !== "none") {

        div.style.display = "block";
        $('#txtReason').attr('required', 'required');

    } else {

        div.style.display = "block";
        $('#txtReason').attr('required', 'required');

    }

}

function hideno()

{

    var div = document.getElementById("txtReason");

    if (div.style.display !== "none") {

        div.style.display = "none";
        $('#txtReason').removeAttr('required');

    } else {

        div.style.display = "none";

        $('#txtReason').removeAttr('required');
    }

}








