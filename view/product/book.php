<?php include ('../include/header.php');
session_start();
?>
<style>
.payment{
    position: absolute;
    top: 50%;
    left: 40%;
    transform: translate(-50%, -50%);
    width: 300px;
    display:none;
}
.otp{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
     display:none;
   
}
.paymentProsess{
    
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 850px;
    background-color: pink;
    

}
.paymentProsess p {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: solid black 1px;
    padding: 0px 10px 0px 10px;
    height: 3rem;

}
.invoice-form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 350px;
}

.invoice-form h2 {
    margin-top: 0;
}

.card-logos img {
    height: 24px;
    margin-right: 8px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input {
    width: calc(100% - 24px);
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

#security-code {
    width: calc(100% - 44px);
    display: inline-block;
}

.info-icon {
    display: inline-block;
    margin-left: 4px;
    background: #ccc;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    text-align: center;
    font-size: 12px;
    line-height: 18px;
    cursor: pointer;
}

.book{
    width: 100%;
    padding: 10px;
    background: #007bff;
    border: none;
    border-radius: 4px;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

.book:hover {
    background: #0056b3;
}
</style>
<?php

if ($_GET['product_id'] && $_GET['qnt']) {
    $product_id = $_GET['product_id'];
    $qnt = $_GET['qnt'];
    echo "hello";
} else {
    header('Location: home.php ');

}


if (isset($_POST['submit'])) {
   // $_SESSION['success'] = "Payment successful";
   
   header('Location: home.php ');

}





?>

<div class="payment">
 <div class="invoice-form">
        <h2>Invoice</h2>
        <div class="card-logos">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXIAAACICAMAAADNhJDwAAABF1BMVEX////rABv3nhsUNMv/XwDqAADn6ekLMMr3mABAU9Hr7voALMv/XgAAG8j3mgAAIMgAJskAJMnV2vX3nRjrABMAGcgHLsr29/3rABeDj9/2oRzQ1fPZ3vb+8eIAFMfm6fnrAAv5kBapsej8fA/6zM/83eD96tP4q0L+7/H84cH/+/X5umz4pjPFy/CUneLx8/y0u+snQs5GW9Nwfts1TND7zpm/xe7+aQb5Rwv95s7yfIP83Lb6x4z96ev1naP719rwX2nvR1P3Pg7yKhT9cgpictj6hRJRY9X5s1mYouTuOUb0kphtfNr4Rgz2qq/xaXH6wX19id7tLDnxdnzsGy73Wzf5vMBcbdgsRs/81qtOYNP3srb6vmfLs19hAAALV0lEQVR4nO2d+0PaShbHUWADxJAgAlIRvNxiffFSdGt91d1lrd5eu/Z21153//+/YyEkOWdm8hzCWNL5/mYeA35ycl4zJKmUlJSUlJSUVJL1l9f+Aj+fJHLhksiFSyIXLolcuCRy4ZLIhUsiFy6JXLgkcuGSyIVLIhcuiVy4JHLhksiFSyIXLolcuOJAvte5eWuqsxftxO3d86l2tw9i+BZLozmR3zx+eMhiff3j+iYE+O2Ly0/lHKh4dHh6/pOAnwP51ePHlWx2Z2NzBbS5sZPNbt5ed3zOO7g4fFPMFcvlVaRycbLp3eku/9dZGvEi33u8neDGtDH3bPbh2sPW9w+nuFddVS7mji63uf+XJREf8s6HbHbDFbetCfUvN8x5B6dvckV33ED90/68/9SPLR7knY8T5+EL3NRO9vYtcd7Bpad9E9RzR4mGHh353pfsTjBvy9Q/Iqd+WvQ3cAz93XmM/+MPpsjIr3eyIYHPLP0367z9o1xI4DPoh4nNXyIiv3oI41KQNrPfpi794DAXwqVgFYsXC/mHX1/RkD8GBE03bUwMfbcc1qcQhr6g//mVFQn5lyg+BZT9d1QTtwz9KJEJYwTkew98xFfer2Vyb3iYl4tJTF3CI79aCZuo0MQzmbW1X/iY5/5c4P/+SgqNvLMT3Y2bWstk+JmvJpB5WOQdjsAJxOdhfrrQ//8VFBL51QYn8feZzLzMk2bn4ZDvfZuX+IR5hittmTBPWAwNh/yWM3L+LYO09lc+5OVisnLFUMg/cGaHf88QWvsHn2spHy2aglCFQf4fTuKbGUpr/+RjXnzFOrTQbfdOxuPxU6/dLcQyYgjke5vR2iqO3tPIM2u/cCFfzQX1W8ajPKuXXt/l0Do69MXcgk75Th7bfRrpeslQ1aqqGiVNH52c1dgRB8+eA7gpBPKPcThy251zupZiQF+xN6pUSlWFVLWkbrGHNuEwrT3d0NKdLeoxOrDWS2uqksZSVL3SpsarvVTQBzfXA3kGI4/NrSzWtdS69WHFIAmlFY3xBe0S7FZNkz3TnQ1GDw68L5Wo0UzpZ9SAdwbeXaKvCKtg5CuxuRWTOW+mGGYiutEbalUCkPqZPiYPHNUnc0sdmAHPQl5Pu0pvkeN1K+QHngR+y0Dk1/FkKw7yXzldy7tg4iaBZ52AXqH2NxAhvWFuOoYTDJtnQ1XdiSsKNeAzeY2VfOBXDEIeY+yc08zDFkTrx/hOrzTIvU+Asno32wQXQRlaRzVoDwUnPZPjtUrUAbpLfCUVhDxmI1+8mU80RhZKud6aAiy12S5k9+rYOirtRTxt3JOfVTeoAzSXiB0NebyefC4zDz0DXasCMaNO7GqDh7ZNGsVTO/aNKY7TVMSDKHM7BMfPAOT/5TTyDU/i/Gb+KSzy1AnyHqQjQMGzdM8cbPHcIiKiqqnD0WhoVPRpxqiSKdCACbL2ncKN/IGzneWSkzvIM3zIV3OhWy0IhJLGOxqIUKXPXAV1tgk7pqpR3+pP3HOt3xicDHVjRH5SnvFACnVEVOQdTiO3u+TuzDlL0GLoznkBkW1is0TB004faxrQmmUbtSYiPiKseuuETDrX0aHO3RPUFvBH/lvcwdNEvvjuFjI+In6iS2E75S4gt/J0VBql1RY7ONJnl1RS7wZ8OX/k3ziD5+9+yDMZPiuP4FnqgAKnGNjh2PnzPSqEBuaWHmyx80gPobtp6PqBrvJFfrUIvyLCsyBDxeEMFT0WXqKUsXJ4HHyP2bGR7p1kR2871yngMgUgf4w/XzGRLzxn6SMHDeGsAZ5XSdsVy9DxQXZhib1FyTfLds5VjmsGDB3w5XyRf4mvh0gg5+0nlkOvU8RFvBPOUNnipOstuB/sfBJZeVpx60XaOnMu7CQZh0tX8vf//sh5Xbl3HWRpkb0tmq5TvOCaUrOxDNg24j0uhJRm3bOCh+tq9NGFYnqNEZDvLcaVzzFTEXqyvwsknXJw4ObgcRvRSjXISihdSnvUk5DkT4eDIpYqeCMhfxtnp5xAzts1/1dY5Clw20479QUFSieRQ+mkk8FTHRZF/+5qt0+EXa87XiYg5voiX1D0FFLzw01vx09UeSrOdBlqcylVe2Mbgq+1S8u7uHTnKDMW92EkumEcAXlME/suyBdfDKHkWpmV8ciFQOsJXQc0m3HMVDjV5ph26eBJZiUU3C90wzgC8hgnPSnkvCnLauiUZQtYWjMRaBoTetq4jQglTH9IzjuYXFWqqhwBYnO+E/mZQcpPfshv4+9pzYd8NfwiohoY6owADp5PzmEoIdSR72il2Urempy2BRNwlueCD0DjR0XO20YMKPenzUQ+4hFK/tSdY6hqnfzbNvup0kwbcaZCnp7tmVozLuWh3WgllzDVofjHTz/kX+dfiOgl3sQ8PHIoxk0CLUhhUEaBmoZ007XeZJ1LE24EVEI1rRwf4qfmOxmXWOQNSDu0FFkbQcrXdfU21gDHFboZjmp5GM+5gnAf+U/GJRZ5DSrwaakJHsSZU04ReU2JjXlnI42CDiEWxtNtFw9XwX8yLrHIU2PH6CaVCrRDiOVBaP5Hc8vszkbkRJvT8sV9AjsGQPuSXT0TFvlSh09cgfdwixYv4EK2n3b3v21qWYzltyEJh95Bgc5hOJAvc5KIMwh1XHCteIiY6tXl7udxvmi1rNahDWPcN2zBgSW39adhkC9zKZTC3ewR8tkVtE7TYzUipTyyc6vKwf1dVbcF2zS/ybikFvwp94lJ1F5JEfN1Ph1XVMhayPse6xWR6XMiX+a21kQDl2oG8oupcG/Re16+hsaZXZl7t5Gx6GV0oZEvc/M2RXhqMPIqipK4jeizFL+FGouzjtV3z/Vz9nBD7+GSOkVhasiSIaYP8GpEO6iesV4YuZ/ZFTujm7us/CbjEjoRZ+qJdebE6nCX1YipcTM/INONe+S4Zw7jjm0FMJ/jMxmX0OlmU+yCQdLHfmZWI6ZSVUXRq8/tdcv/FAZEf8uMno2g4Jn2TYASuqhiphbDhkzeRmgSztpUmPp/pVrS9GH+5e54qOnYOc16LMz6ZhdVXziRL+3SIUu0MyeDZAH5aLuQh0xdUapVhTq/MjVynMBUNVJoFoQT+dIukLNUp5w52W7CbUQ7qvpasGG6JbREvTpurGM14L7RvSfjkrkM1NIZ5VnIPja7GtE/Mqoj83TkjpgVnxCwXRqT4ZAv6WJnWwXSyqmW+LPLPJHqnXEbeTOTQatc2FYYmoL2XsySyCX9jsgV91R/FvdJrE0NctUQktK0MnfU72XnOOF8n8UsifzhiqMeds0UBbwa0c4vmBUsNnA9bSXaRCnK/JIZ1bOa55dK4s+zQF2MUCPdq8tqxFT3uFJifIuiVkZO3O1BvlJ16YpDLGCvh60k/ggRVDNURwbV93jSnV1NCIOt9nhoaCVDnaaI1emzEoxRHaYya2kYUXNpF9adQZnf+jsK/Klt3Ga+8J/aEiogUdMGfbSL3NPaaveeno/z+bvPdfqJIAXPs0zVPD8OlLQflC+BEvXYhOXQsjwcJFKn/MdWmEfgcDIX+QicZVJCHvS0TFqex5n9ub+fjIdULs9D+y62/3e5WBaCJB9NKVwhn3krH8Aan+RjhoVLPkxbuOQj44VL0IsRMvLFCI7k6z+ES8xLbsK8Go6VfMlNSr7KKRbJF5YJl3wtn3DJl08Kl3zFqnDJFwkLl3xdtnDN/VL4LM9L4Y/kS+G51Xn88DCBDPr6x/WNh31jbV9cfnqTAxWPDk/PE5ujkJoTuam9zs3bqW46IWBjbe/unk+0u/2TwJ4pDuRSkSSRC5dELlwSuXBJ5MIlkQuXRC5cErlwSeTCJZELl0QuXBK5cEnkwiWRC5dELlwSuZSUlJSUlJSUGP0fph16dFGTPc4AAAAASUVORK5CYII=" alt="Visa">
            <img src="data:image/png;base64,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" alt="MasterCard">
            <img src="https://w7.pngwing.com/pngs/113/695/png-transparent-charge-credit-card-jcb-payment-credit-cards-icon.png" alt="JCB">
            <img src="https://banner2.cleanpng.com/20180713/ezu/kisspng-american-express-credit-card-computer-icons-debit-hotel-menu-card-5b483c35a908d9.9148176215314606616924.jpg" alt="American Express">
        </div>
            <div class="form-group">
                <label for="card-number">Card number</label>
                <input type="text" required id="card-number" placeholder="1234 5678 9012 3456" >
            </div>
            <div class="form-group">
                <label for="card-name">Name on card</label>
                <input type="text" required id="card-name" placeholder="Ex. John Website">
            </div>
            <div class="form-group">
                <label for="expiry-date">Expiry date</label>
                <input type="text" required id="expiry-date" placeholder="01 / 19">
            </div>
            <div class="form-group">
                <label for="security-code">Security code</label>
                <input type="text" required id="security-code" placeholder="•••">
                <span class="info-icon">?</span>
            </div>
            <button class=" book paymentnext">Next</button>
    </div>
</div>
<div class="otp">
     <div class="invoice-form">
     <div class="form-group">
         <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2>Near by Home</h2>
        <p>Don't share this one-time password with anyone. It's for your security. If you didn't request it, contact support immediately.</p>
                <label for="security-code">One time Password</label>
                <input type="text" required id="security-code" placeholder="* * * *">
                
        </div>
        <br>
           
    <button type="submit" name="submit">Submit</button>
</form>
             
    </div>
     
</div>
<div class="f">
<div class="paymentProsess">
    <div class="adreass">+ Add Address</div>
    <p><span>quantity</span> <span>5</span></p>
    <p><span>Price</span> <span>Rs 100</span></p>
    <p><span>Delivery charge</span> <span>Rs 150</span></p>
    <p><span>Total</span> <span>Rs 500</span></p>
    <br>
     <button class="book getpay">Submith</button>
</div>
</div>

 
<?php include('../include/footer.php');
?>

<script>
    paymentnext=document.querySelector('.paymentnext');
let getpay = document.querySelector('.getpay');
let payment = document.querySelector('.payment');
let otp= document.querySelector('.otp');
getpay.addEventListener('click', () => {
    payment.style.display = 'block';
   
});
paymentnext.addEventListener('click', () => {
    payment.style.display = 'none';
    otp.style.display = 'block';
   
   
});


</script>