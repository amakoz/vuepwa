<h2 class="mb-4">Krok 3</h2>
<div class="grid grid-columns-1 grid-gap-8">
    <label class="font-bold" for="email">E-mail*
        <input v-validate="'required|email'" class="mt-2 w-full" v-model="form.email" type="text"
               name="email"
               id="email">
        <p v-show="errors.has('email')" class="text-green text-xs mt-2 md:absolute">@{{ errors.first('email') }}</p>
    </label>
    <label class="font-bold" for="password">Hasło*
        <input v-validate="'required|min:6'" class="mt-2 w-full" v-model="form.password"
               type="password"
               name="password"
               id="password">
        <p v-show="errors.has('password')"
           class="text-green text-xs mt-2 md:absolute">@{{ errors.first('password') }}</p>
    </label>
</div>