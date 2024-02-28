<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<title>Register Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .main-content{
	width: 50%;
	border-radius: 20px;
	box-shadow: 0 5px 5px rgba(0,0,0,.4);
	margin: 5em auto;
	display: flex;
}
.company__info{
	background-color: #008080;
	border-top-left-radius: 20px;
	border-bottom-left-radius: 20px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	color: #fff;
}
.fa-android{
	font-size:3em;
}
@media screen and (max-width: 640px) {
	.main-content{width: 90%;}
	.company__info{
		display: none;
	}
	.login_form{
		border-top-left-radius:20px;
		border-bottom-left-radius:20px;
	}
}
@media screen and (min-width: 642px) and (max-width:800px){
	.main-content{width: 70%;}
}
.row > h2{
	color:#008080;
}
.login_form{
	background-color: #fff;
	border-top-right-radius:20px;
	border-bottom-right-radius:20px;
	border-top:1px solid #ccc;
	border-right:1px solid #ccc;
}
form{
	padding: 0 2em;
}
.form__input{
	width: 100%;
	border:0px solid transparent;
	border-radius: 0;
	border-bottom: 1px solid #aaa;
	padding: 1em .5em .5em;
	padding-left: 2em;
	outline:none;
	margin:1.5em auto;
	transition: all .5s ease;
}
.form__input:focus{
	border-bottom-color: #008080;
	box-shadow: 0 0 5px rgba(0,80,80,.4); 
	border-radius: 4px;
}
.btn{
	transition: all .5s ease;
	width: 70%;
	border-radius: 30px;
	color:#008080;
	font-weight: 600;
	background-color: #fff;
	border: 1px solid #008080;
	margin-top: 1.5em;
	margin-bottom: 1em;
}
.btn:hover, .btn:focus{
	background-color: #008080;
	color:#fff;
}
    </style>
</head>
<body>
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-20 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Register</h2>
					</div>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <b>Opps!</b> {{ session('error') }}
                        </div>
                        @endif
                        <form action="{{ route('registeraksi') }}" method="post" class="form-group">
                            @csrf
					<div class="row">
						<form control="" class="form-group">
                            <div class="row">
								<input type="text" name="name" id="name" class="form__input" placeholder="Name" value="{{ old('name')}}">
							</div>
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username" value="{{ old('username')}}">
							</div>
                            <div class="row">
								<input type="email" name="email" id="email" class="form__input" placeholder="Email" value="{{ old('email')}}">
							</div>
							<div class="row">
                                <a class="fa fa-lock"></a>
								<input type="password" name="password" id="password" class="form__input" placeholder="Password">
							</div>
                            <div class="row">
                                <a class="fa fa-lock"></a>
								<input type="password" name="password_confirmation" id="password" class="form__input" placeholder="Password Confirmation">
							</div>
                            <div class="row">
								<input type="text" name="alamat" id="alamat" class="form__input" placeholder="Alamat" value="{{ old('alamat')}}">
							</div>
                            <div class="row">
                                <select name="role" class="form_input" required>
                                    <option value="">Level</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="peminjam" {{ old('role') == 'peminjam' ? 'selected' : '' }}>Peminjam</option>
                                </select>
                            </div>
							<div class="row">
								<input type="submit" value="Register" class="btn">
							</div>
						</form>
					</div>
					<div class="row">
						<p>Back to <a href="/">Login</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<div class="container-fluid text-center footer">
		<p> by Puti Sabila &hearts;</p>
	</div>
</body>