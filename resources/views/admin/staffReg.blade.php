<!DOCTYPE html>
<html>
<head>
<title>Registration Form - Tutsmake.com</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
@include('admin.adminhome')
<style>
    :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}
body {
 
 margin: 0;
   background-image: linear-gradient(to right, #02AAB0 0%, #00CDAC  51%, #02AAB0  100%);
 font-family: sans-serif;
 font-weight: 100;
}
.login,
.image {
  min-height: 100vh;
}



.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
  border-radius: 2rem;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
  height: auto;
  border-radius: 2rem;
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  cursor: text;
  /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
#form{
  background-color:white;
  border-radius:10px;
  padding:30px 30px 30px;
  width:400px;
  margin-left:-200px;
}
.error{
  color:red;
  margin-left: 10px;
}
</style>
<body>

<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
             
               <form id="form"action="{{url('post-registration')}}" method="POST" id="regForm">
                 {{ csrf_field() }}
                 @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif  <h3 class="login-heading mb-4">Office Staff Registration</h3>
                <div class="form-label-group">
                  <input type="text" id="inputName" name="name" class="form-control" placeholder="Full name" >
                  <label for="inputName"> Name</label>

                  @if ($errors->has('name'))
                  <span class="error">{{ $errors->first('name') }}</span>
                  @endif       

                </div> 
                <div class="form-label-group">
                  <input type="text" id="inputMiddle" name="middle_name" class="form-control" placeholder="Full name" >
                  <label for="inputMiddle">Middle Name</label>

                  @if ($errors->has('middle_name'))
                  <span class="error">{{ $errors->first('middle_name') }}</span>
                  @endif       

                </div> 
                <div class="form-label-group">
                  <input type="text" id="Surname" name="surname" class="form-control" placeholder="Full name" autofocus>
                  <label for="Surname">Surname</label>

                  @if ($errors->has('surname'))
                  <span class="error">{{ $errors->first('surname') }}</span>
                  @endif       

                </div> 

                <div class="form-label-group">
                <select name="position" class="form-control" id="addressSelect">
                <option value="" disabled selected>Designation</option>
    
    <option value="Municipal Agriculturist" {{ old('position') == 'Municipal Agriculturist' ? 'selected' : '' }}>Municipal Agriculturist</option>
    <option value="Senior Agriculturist" {{ old('position') == 'Senior Agriculturist' ? 'selected' : '' }}>Senior Agriculturist</option>
<option value="Agriculturist II" {{ old('position') == 'Agriculturist II' ? 'selected' : '' }}>Agriculturist II</option>
<option value="Agricultural Technologist" {{ old('position') == 'Agricultural Technologist' ? 'selected' : '' }}>Agricultural Technologist</option>
<option value="Administrative Officer" {{ old('position') == 'Administrative Officer' ? 'selected' : '' }}>Administrative Officer</option>
<option value="Administrative Assistant" {{ old('position') == 'Administrative Assistant' ? 'selected' : '' }}>Administrative Assistant</option>
<option value="Farm Worker" {{ old('position') == 'Farm Worker' ? 'selected' : '' }}>Farm Worker</option>
<option value="Administrative Aide" {{ old('position') == 'Administrative Aide' ? 'selected' : '' }}>Administrative Aide</option>
<option value="Job Order" {{ old('position') == 'Job Order' ? 'selected' : '' }}>Job Order</option>
<option value="Enumerator" {{ old('position') == 'Enumerator' ? 'selected' : '' }}>Enumerator</option>

</select>
   

    @if ($errors->has('address'))
        <span class="error">{{ $errors->first('address') }}</span>
    @endif
</div>

                <div class="form-label-group">
                <select name="address" class="form-control" id="addressSelect">
                <option value="" disabled selected>Select a barangay</option>
    <option value="Agos" {{ old('address') == 'Agos' ? 'selected' : '' }}>Agos</option>
    <option value="Bacolod" {{ old('address') == 'Bacolod' ? 'selected' : '' }}>Bacolod</option>
    <option value="Buluang" {{ old('address') == 'Buluang' ? 'selected' : '' }}>Buluang</option>
    <option value="Caricot" {{ old('address') == 'Caricot' ? 'selected' : '' }}>Caricot</option>
    <option value="Cawacagan" {{ old('address') == 'Cawacagan' ? 'selected' : '' }}>Cawacagan</option>
    <option value="Cotmon" {{ old('address') == 'Cotmon' ? 'selected' : '' }}>Cotmon</option>
    <option value="Cristo Rey" {{ old('address') == 'Cristo Rey' ? 'selected' : '' }}>Cristo Rey</option>
    <option value="Del Rosario" {{ old('address') == 'Del Rosario' ? 'selected' : '' }}>Del Rosario</option>
    <option value="Divina Pastora" {{ old('address') == 'Divina Pastora' ? 'selected' : '' }}>Divina Pastora</option>
    <option value="Goyudan" {{ old('address') == 'Goyudan' ? 'selected' : '' }}>Goyudan</option>
    <option value="Lobong" {{ old('address') == 'Lobong' ? 'selected' : '' }}>Lobong</option>
    <option value="Lubigan" {{ old('address') == 'Lubigan' ? 'selected' : '' }}>Lubigan</option>
    <option value="Mainit" {{ old('address') == 'Mainit' ? 'selected' : '' }}>Mainit</option>
    <option value="Manga" {{ old('address') == 'Manga' ? 'selected' : '' }}>Manga</option>
    <option value="Masoli" {{ old('address') == 'Masoli' ? 'selected' : '' }}>Masoli</option>
    <option value="Neighborhood" {{ old('address') == 'Neighborhood' ? 'selected' : '' }}>Neighborhood</option>
    <option value="Niño Jesus" {{ old('address') == 'Niño Jesus' ? 'selected' : '' }}>Niño Jesus</option>
    <option value="Pagatpatan" {{ old('address') == 'Pagatpatan' ? 'selected' : '' }}>Pagatpatan</option>
    <option value="Palo" {{ old('address') == 'Palo' ? 'selected' : '' }}>Palo</option>
    <option value="Payak" {{ old('address') == 'Payak' ? 'selected' : '' }}>Payak</option>
    <option value="Sagrada" {{ old('address') == 'Sagrada' ? 'selected' : '' }}>Sagrada</option>
    <option value="Salvacion" {{ old('address') == 'Salvacion' ? 'selected' : '' }}>Salvacion</option>
    <option value="San Isidro" {{ old('address') == 'San Isidro' ? 'selected' : '' }}>San Isidro</option>
    <option value="San Juan" {{ old('address') == 'San Juan' ? 'selected' : '' }}>San Juan</option>
    <option value="San Miguel" {{ old('address') == 'San Miguel' ? 'selected' : '' }}>San Miguel</option>
    <option value="San Rafael" {{ old('address') == 'San Rafael' ? 'selected' : '' }}>San Rafael</option>
    <option value="San Roque" {{ old('address') == 'San Roque' ? 'selected' : '' }}>San Roque</option>
    <option value="San Vicente" {{ old('address') == 'San Vicente' ? 'selected' : '' }}>San Vicente</option>
    <option value="Santa Cruz" {{ old('address') == 'Santa Cruz' ? 'selected' : '' }}>Santa Cruz</option>
    <option value="Santiago" {{ old('address') == 'Santiago' ? 'selected' : '' }}>Santiago</option>
    <option value="Sooc" {{ old('address') == 'Sooc' ? 'selected' : '' }}>Sooc</option>
    <option value="Tagpolo" {{ old('address') == 'Tagpolo' ? 'selected' : '' }}>Tagpolo</option>
    <option value="Tres Reyes" {{ old('address') == 'Tres Reyes' ? 'selected' : '' }}>Tres Reyes</option>
</select>
   

    @if ($errors->has('address'))
        <span class="error">{{ $errors->first('address') }}</span>
    @endif
</div>


                <div class="form-label-group">
                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" >
                  <label for="inputEmail">Email address</label>

                  @if ($errors->has('email'))
                  <span class="error">{{ $errors->first('email') }}</span>
                  @endif    
                </div> 

                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                  <label for="inputPassword">Password</label>
                  
                  @if ($errors->has('password'))
                  <span class="error">{{ $errors->first('password') }}</span>
                  @endif  
                </div>

                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign Up</button>
               
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>