<?php
session_start();
$carrinho = false;
include 'diversos/header.php';
include 'diversos/navbar.php';
?>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-5">
            <form>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label  class="form-label">email</label>
                    <input type="password" class="form-control" >
                </div>
                <div class="mb-3">
                    <label class="form-label">telefone</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
include 'diversos/footer.php';

?>