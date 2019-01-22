$flag = false;
var regex=/^[0-9]+$/;
function idValidity()
{
    $value = document.getElementById('uname');
    if ($value.value.length > 3 || !$value.value.match(regex))
    {
        $value.style.border = "5px solid red";
        $flag = false;
    }

    else
    {
        $value.style.border = "5px solid green";
        $flag = true;
    }
}

function passValidity()
{
    $value = document.getElementById('upass');
    if($value.value.length < 5)
    {
        $value.style.border = "5px solid red";
        $flag = false;
    }

    else
    {
        $value.style.border = "5px solid green";
        $flag = true;
    }
}

function submitRedirect()
{
    if ($flag)
    {
        return $flag;
    }

    else
    {
        alert('Syntax Error!');
        return $flag;
    }
}

function NewAccount()
{
    $clickedNew = document.getElementById('signUp');
    $signIn = document.getElementById('logIn');
    $signIn.style.display = "none";
    $clickedNew.style.display = "block";
}

function returnSignIn()
{
    $clickedNew = document.getElementById('signUp');
    $signIn = document.getElementById('logIn');
    $signIn.style.display = "block";
    $clickedNew.style.display = "none";
}