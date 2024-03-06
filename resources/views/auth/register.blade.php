<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Registration </title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

<x-guest-layout>
@extends('admin.adminhome')
@section('content')
    <form method="POST" action="{{ url('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="surname" :value="__('Last Name')" />
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="name" :value="__('First Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Middle Name')" />
            <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" required autofocus autocomplete="middle_name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
       
        <div>
            <x-input-label for="name" :value="__('Extension Name')" />
            <x-text-input id="extension_name" placeholder="Optional" class="block mt-1 w-full" type="text" name="extension_name" :value="old('extension_name')"  />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <br><label for="address" class="form-label">Address:</label>
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

   
            </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    @endsection
</x-guest-layout>

</body>
</html>