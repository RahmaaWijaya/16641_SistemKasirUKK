<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/css/tailwind.output.css')}}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer ></script>
    <script src="{{asset('assets/js/init-alpine.js')}}"></script>
</head>
<body>
    <!-- <div class="row justify-content-center align-items-center g-2">
        <div class="col-md-4">
            <form action="{{route('auth.verify')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" require>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div> -->

    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800" >
          <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
              <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{asset('assets/img/login-office.jpeg')}}../" alt="Office" />
              <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{asset('assets/img/login-office-dark.jpeg')}}" alt="Office" />
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
              <div class="w-full">
                <form action="{{route('auth.verify')}}" method="post">
                    @csrf
                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Login</h1>
                    
                    <!-- Input Email -->
                    <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Email</span>
                      <input
                        type="email"
                        name="email"
                        id="exampleInputEmail1"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="example@example.com"
                        aria-describedby="emailHelp"
                        required
                      />
                      <div id="emailHelp" class="text-xs text-gray-600 dark:text-gray-400">
                      </div>
                    </label>
                    
                    <!-- Input Password -->
                    <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Password</span>
                      <input
                        type="password"
                        name="password"
                        id="exampleInputPassword1"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="***************"
                        required
                      />
                    </label>
                    
                    <!-- Submit Button -->
                    <button
                      type="submit"
                      class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    >
                      Log in
                    </button>
                  </form>
                  
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>