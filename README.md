
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

>Start xampp.Run the command php artisan migrate in the terminal to create tables at the database specified in the .env file. If there is an error don't be afraid. Just restart xampp.
<br>
[Sign in page template](https://codepen.io/ayush602/pen/mdQJreW)
[Free Front End Templates](https://www.freefrontend.com)

> The event(new Lockout($this)); line is dispatching a new instance of the Lockout event in Laravel.
> The Lockout event is typically used to indicate that a user has been locked out of their account due to too many failed login attempts. 
> This is part of Laravel's built-in rate limiting functionality to prevent brute force attacks.
> When this event is dispatched, any event listeners that are registered to listen for the Lockout event will be triggered.
> These listeners might perform actions such as sending a notification to the user, logging the lockout event, or other custom behavior defined in your application.


## php artisan tinker
> php artisan tinker is a REPL (Read-Eval-Print Loop) for Laravel. It allows you to interact with your Laravel application from the command line in an interactive shell.
> You can use it to run Eloquent queries, test your application's functionality, and experiment with PHP code.
> To start the tinker shell, run the php artisan tinker command in your terminal. This will open an interactive shell where you can enter PHP code and see the results immediately.
> For example, you can use tinker to create new Eloquent models, retrieve data from your database, or test out new functionality before adding it to your application.
> To Exit the tinker shell, type ctrl + C

```angular2html
php artisan tinker
```
>Then in the terminal you can write ```App\Models\User::factory()->create();``` to create a new user in the database.
> You can pass the required number of records in the factory() method to create multiple records at once.

## Laravel Factories
>A factory class in Laravel is a class that is used to create instances of models. It's a way to generate test data for your application. Factories help in creating multiple records for testing or seeding the database. They provide a convenient way to generate new model instances for testing or seeding your database.  The HasFactory trait is included in Laravel's Eloquent model class. When you use the HasFactory trait in your model, it allows you to use the factory methods on your model to generate instances of the model.  For example, if you have a User model and you want to create a new user instance, you can use the factory method like this:
```angular2html
$user = User::factory()->create();
```
This will create a new user instance and save it to the database. The create method will use the default factory for the User model to set the attributes for the new user. If you have defined a factory for your User model, it will use that factory to generate the attributes.  The HasFactory trait also provides other methods for generating model instances, such as make (which creates a new instance without saving it to the database) and raw (which returns the attribute array for a new instance without creating the instance).  In summary, the HasFactory trait provides a convenient way to generate instances of a model for testing or seeding your database.


## Laravel Facades and the Auth Facade
> A facade, in the context of the Laravel framework, is a class that provides a static-like interface to services inside the service container. Facades are a convenient way to access Laravel's components. They provide a terse, memorable syntax that allows you to use Laravel's features without remembering long class names that must be injected or configured manually. Furthermore, because of their unique usage of PHP's dynamic methods, they are easy to test.
> The Auth facade is a static interface to the underlying authentication services provided by Laravel. It provides methods for logging users in and out, checking if a user is logged in, getting the currently logged in user, and more. The Auth facade is just one of many facades provided by Laravel.
> The attempt method is part of Laravel's Auth facade. It is used to attempt to log a user into your application by validating the provided credentials (usually email/username and password). If the credentials are valid, the user is logged into the application and the method returns true. If the credentials are invalid, the user is not logged in and the method returns false.
```php
$credentials = $request->only('email', 'password');
```
> The $request->only('email', 'password') method is used to retrieve only the 'email' and 'password' fields from the request object. This is useful when you want to extract specific fields from a request object and ignore the rest of the data. In this case, the $credentials variable will contain an array with only the 'email' and 'password' fields from the request.
> The attempt method is used to authenticate a user based on the provided credentials. It takes an array of credentials as its first argument and an optional boolean as its second argument. The method will return true if the authentication is successful and false if it is not. The optional boolean argument can be used to determine if the user should be remembered after authentication.

```php
if (Auth::attempt($credentials)) {
    return redirect()->intended('dashboard');
}
```

## Redirect()

Redirecting to a named route:

```php
return redirect()->route('home');
```


Redirecting to a specific URL:
```php
return redirect() -> to('https://www.google.com');
```


Redirecting to the previous page:
```php
return redirect() -> back();
```



Redirecting with a flash message:
```php
return redirect() -> route('home') -> with('status', 'Profile updated!');
```


Redirecting with input data:
```php
return redirect() -> route('profile') -> withInput();
```



The withInput() method is used to flash the current input data to the session. This is often used if validation fails and you want to redirect the user back to the form. The input data will be available on the next request.  You don't need to pass anything to the withInput() method if you want to flash the entire old input data. However, if you want to flash only some of the input data, you can pass an array of keys of the input data that you want to keep. For example:
```php
return redirect() -> route('profile') -> withInput($request->only('name', 'email'));
```


To access the flashed input data in your 'profile' route, you can use the old method in your Blade view. Here's an example:
```php
<input type="text" name="name" value="{{ old('name') }}">
```


Redirecting to a controller action:

```php
return redirect() -> action('AuthController@login');
```


Redirecting to a route with parameters:
```php
return redirect() -> route('profile', ['id' => 1]);
```


## Session

In Laravel, `session()` is a helper function that provides access to the session instance. The session is a way to store information (in variables) to be used across multiple pages. It's a way to carry data across different pages of your application during a user's single visit.

Here are a few examples of how you can use the `session()` function:

1. Storing data in the session:

```php
session(['key' => 'value']);
```

2.Retrieving data from the session:

```php
$value = session('key');
```

3. Retrieving data from the session with a default value:

```php
$value = session('key', 'default');
```

4. Checking if a piece of data is present in the session:

```php
if (session()->has('key')) {
    //
}
```

5. Removing data from the session:

```php
session()->forget('key');
```

6. Removing all data from the session:

```php
session()->flush();
```

Remember, session data is temporary and will be cleared once the user's session expires or the user logs out.

## On deleting a user account
```
public function up()
{
Schema::create('contacts', function (Blueprint $table) {
$table->foreignId('user_id')->constrained()->onDelete('cascade');
});
}
```
The `onDelete('cascade')` clause in Laravel means that if the referenced row in the parent table (`users` table in your case) is deleted, then the corresponding rows in the child table (`contacts` table in your case) will be automatically deleted by the database system. This is known as a cascading delete.

So, if you delete a user from the `users` table, all the contacts associated with that user in the `contacts` table will also be deleted. This helps to maintain the integrity of your data by automatically removing related data in the `contacts` table when a `user` is removed.

Laravel uses conventions to determine which column you are referencing in the users table. When you use the `constrained()` method without any arguments, Laravel assumes that the foreign key should point to the `id` column of the referenced table. This is because `id` is the conventional name for the primary key in Laravel.

In the case of `$table->foreignId('user_id')->constrained()->onDelete('cascade');`, Laravel will create a foreign key that references the `id` column on the `users` table. This is because the `foreignId` method takes the name of the column (`user_id`), strips the `_id` suffix, and assumes that the resulting string (`user`) is the name of the table in its plural form (`users`).

If your foreign key references a different column, you can specify it as an argument to the `constrained` method. For example, if your users table uses `uuid` as the primary key, you can define the foreign key like this:

```php
$table->foreignId('user_id')->constrained('users', 'uuid')->onDelete('cascade');
```

In this case, Laravel will create a foreign key that references the `uuid` column on the `users` table.

```
php artisan make:migration create_contacts_table -mf
```

The `php artisan make:migration create_contacts_table -mf` command in Laravel will create a new migration file for creating the `contacts` table, a model named `Contact`, and a factory for the `Contact` model.

Here's what each part of the command does:

- `php artisan make:migration create_contacts_table`: This part of the command creates a new migration file for creating the `contacts` table. The name of the migration file will be based on the current date and the name you provide (`create_contacts_table` in this case).

- `-m`: This option tells Laravel to create a new Eloquent model named `Contact`. The model will be placed in the `app/Models` directory.

- `-f`: This option tells Laravel to create a new factory for the `Contact` model. The factory will be placed in the `database/factories` directory. Factories are used to generate test data for your database.

So, running this command will create three new files in your Laravel project: a migration file, a model file, and aThe "419 Page Expired" error in Laravel is usually related to CSRF (Cross-Site Request Forgery) protection. Laravel includes CSRF protection out of the box, and this error can occur if the CSRF token is missing or expired.

When you make a POST request in Laravel, you need to include a CSRF token in your request. This token is used to verify that the authenticated user is the one actually making the requests to the application.

If you're seeing this error, it's likely that the CSRF token is either missing from your form or the session has expired. Here's how you can include the CSRF token in your form:

```html
<form method="POST" action="/your-route">
    @csrf
    <!-- Rest of your form fields -->
</form>
```

The `@csrf` directive is a Blade shortcut to generate a hidden input field with the CSRF token as the value.

If you're making an AJAX request, you'll need to include the CSRF token in your request header:

```javascript
$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    // rest of your AJAX setup
});
```

The "419 Page Expired" error in Laravel is usually related to CSRF (Cross-Site Request Forgery) protection. Laravel includes CSRF protection out of the box, and this error can occur if the CSRF token is missing or expired.  When you make a POST request in Laravel, you need to include a CSRF token in your request. This token is used to verify that the authenticated user is the one actually making the requests to the application.  If you're seeing this error, it's likely that the CSRF token is either missing from your form or the session has expired. Here's how you can include the CSRF token in your form:

```php
<form method="POST" action="/your-route">
    @csrf
    <!-- Rest of your form fields -->
</form>
```


The "403 This action is unauthorized" error typically occurs when the user doesn't have the necessary permissions to perform the requested action.
I encountered this error when I used a CreateContactRequest class. In that class the authorize method was returning false. I changed it to true and the error was resolved.


## Laravel Testing
To write tests for your middleware in Laravel, you can use the built-in testing features provided by the framework. Here's a step-by-step guide on how you can do this:

1. **Create a new test file**: Laravel provides a command to generate a new test file. You can use the `make:test` Artisan command to create a new test file for your middleware. Let's say your middleware is named `AuthGuard`, you can create a test file for it like this:

```bash
php artisan make:test AuthGuardTest
```

This will create a new test file in the `tests/Unit` directory.

2. **Write the test**: In the test file, you can write a test method to test your middleware. You can use the `actingAs` method to authenticate a user for a single test. After that, you can make a request to a route that uses your middleware and assert the expected outcome.

Here's an example of how you can write the test:

```php
<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthGuardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_guests()
    {
        $response = $this->get('/profile');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function it_allows_authenticated_users()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/profile');

        $response->assertOk();
    }
}
```

In the first test, we're making a GET request to the `/profile` route without authenticating a user. Since your `AuthGuard` middleware should redirect guests to the login page, we're asserting that the response should be a redirect to `/login`.

In the second test, we're authenticating a user using the `actingAs` method and then making a GET request to the `/profile` route. Since authenticated users should be able to access this route, we're asserting that the response should be OK (HTTP status code 200).

3. **Run the test**: After writing the test, you can run it using the `php artisan test` command.

Please note that this is a basic example and your tests might need to be more complex depending on the logic in your middleware. Also, remember to replace the route (`/profile`) and the redirect route (`/login`) with the actual routes in your application.

## Forgot Password Functionality in Laravel

```php
public function forgot_passwordPost(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    $token = Str::random(30);
    $forgot = new forgot_password();
    $forgot->email = $request->email;
    $forgot->token = $token;
    $forgot->save();
    Mail::send('auth.email', ['token' => $token], function ($message) use ($request) {
        $message->to($request->email)->subject('Reset Password');
    });
    return view('temp');
}
```

1. **Validation**: The method starts by validating the incoming request with the `validate` method. It checks if the `email` field is present, is a valid email, and exists in the `users` table in the `email` column.

2. **Token Generation**: If validation passes, a random 30-character token is generated using Laravel's `Str::random` method.

3. **Database Record**: A new `forgot_password` model instance is created and the `email` and `token` fields are set. This record is then saved to the database. This creates a link between the user's email and the generated token.

4. **Email Sending**: An email is sent to the user's email address with the generated token. The `Mail::send` method is used to send the email. The first parameter is the view that will be used for the email's content (`auth.email`), the second parameter is an array of data that will be available in the view (in this case, the generated token), and the third parameter is a closure that defines the message's recipients and subject.

5. **Response**: Finally, the method returns a view (`temp`). This could be a page informing the user that an email has been sent to them with instructions to reset their password.

When the user clicks on the link in the email, they will be directed to a page where they can reset their password. The token in the URL is used to verify the request and ensure it's the same user who requested the password reset.


## php artisan tinker
PHP Artisan Tinker is a REPL (Read-Eval-Print Loop) for Laravel, which is powered by the PsySH console under the hood. It allows you to interact with your entire Laravel application from the command line, including the Eloquent ORM, jobs, events, and more.

Here's how you can use it:

1. **Starting Tinker**: You can start a Tinker session by running the `php artisan tinker` command in your terminal. This will bring up a new prompt where you can start typing PHP code.

```bash
php artisan tinker
```

2. **Interacting with Eloquent**: You can use Tinker to interact with your Eloquent models. For example, you can create, read, update, and delete records in your database.

```php
// Create a new user
$user = new App\Models\User;
$user->name = 'John Doe';
$user->email = 'john@example.com';
$user->password = Hash::make('password');
$user->save();

// Retrieve all users
$users = App\Models\User::all();

// Update a user
$user = App\Models\User::find(1);
$user->name = 'Jane Doe';
$user->save();

// Delete a user
$user = App\Models\User::find(1);
$user->delete();
```

3. **Running Code**: You can run any PHP code directly in Tinker. This is useful for testing out small snippets of code.

```php
echo Str::random(10);
```

4. **Interacting with Laravel's Components**: You can interact with any of Laravel's components. For example, you can dispatch jobs, send notifications, fire events, and more.

```php
// Dispatch a job
dispatch(new App\Jobs\ProcessPodcast);

// Send a notification
$user = App\Models\User::first();
$user->notify(new App\Notifications\InvoicePaid);
```

5. **Exiting Tinker**: You can exit a Tinker session by typing `exit` or `quit` at the prompt, or by pressing `CTRL + D`.

Remember, any changes you make to your database while in a Tinker session are permanent, so be careful when modifying data.

## Database Model Factory
A database model factory in Laravel is a class that defines the structure and attributes of a model. 
It is used to generate fake data for testing or seeding the database.

Here's how you can create a model factory in Laravel:
```php
php artisan make:factory UserFactory --model=User
```
In the factory class, in the definition method you can define the attributes of the model that you want to generate fake data for.
```php
public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName
        ];
    }
```
You can then use the factory to create instances of the model with the specified attributes.
```php
$user = User::factory()->create();
```
This will create a new user instance with a randomly generated first name.
You can create it in the terminal after running the tinker command.
Or you can write it in the seeder file to create multiple records at once.
Create the seeder file using the following command:
```php
php artisan make:seeder UserSeeder
```

For example:
```php
User::factory()->count(10)->create();
```

In our project to create some amount of contact record for a user with user id 1,
Note: The user_id field should be fillable in the Contact model. And remember to start the tinker
session before running the command in the terminal.
```php
Contact::factory()->count(5)->create(['user_id' => 1]);
```

You can check your Laravel project's version by using the Artisan command-line tool that is included with Laravel.Run the following command:

```bash
php artisan --version
```

This command will output the version of Laravel that your project is using.

> There is no built in ```api.php``` file in Laravel version 11. 
When the ```php artisan install:api``` command in run on the terminal the file is created.


Ajax (Asynchronous JavaScript and XML) is a set of web development techniques that allows web pages to be updated asynchronously by exchanging data with a web server
behind the scenes. This means that web pages can be updated without reloading the entire page, resulting in a more dynamic and interactive user experience.
Ajax is commonly used to make requests to a server to fetch data, submit form data, and update parts of a web page without reloading the entire page.
It uses a combination of HTML, CSS, JavaScript, and XML (or JSON) to achieve this functionality.

Include the jquery library in your project by adding the following line to the head section of your HTML file:
```html
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
```

Here's a basic example of how you can use Ajax in a Laravel application to search for contacts based on a user's input:

```php
$(document).ready(function() {
            $('#search').on('keyup', function(e) {
                e.preventDefault();
                const query = $(this).val();
                // alert(query);
                $.ajax({
                    url: "{{route('contacts.search')}}",
                    type: "GET",
                    data: {'query': query},
                    success: function(data) {
                    let rows = '';
                    $.each(data, function(key, value) {
                        rows += '<tr>';
                        rows += '<td>' + value.first_name + '</td>';
                        rows += '<td>' + value.last_name + '</td>';
                        rows += '<td>' + value.email + '</td>';
                        rows += '<td>' + value.phone + '</td>';
                        rows += '<td>' + value.address + '</td>';
                        rows += '<td><a href="/contacts/' + value.id + '/edit" class="more">Details</a></td>';
                        rows += '<td><a href="/contacts/' + value.id + '/delete" class="more">Delete</a></td>';
                        rows += '</tr>';
                    });
                    $('.custom-table tbody').html(rows);
                }
                });
            });
        });
```
```$(document).ready(function() {``` This line is using jQuery to ensure that the code inside this function will only run once the DOM is fully loaded.
```$('#search').on('keyup', function(e) {``` This line is attaching a keyup event listener to the HTML element with the id search. This means that the function will be executed every time a key is released while this input field is focused. A input field with the id search should be present in the HTML document.
```e.preventDefault();``` This line is preventing the default action of the event. In this case, it's preventing the form from being submitted when the user presses enter.  
```const query = $(this).val();```: This line is getting the current value of the input field (which is the text that the user has entered) and storing it in the query variable.  
```$.ajax({```: This line is starting an AJAX request. AJAX allows you to send and receive data asynchronously, without refreshing the page.  
```url: "{{route('contacts.search')}}",```: This line is setting the URL that the AJAX request will be sent to. It's using Laravel's route function to generate the URL for the contacts.search route.  
```type: "GET",```: This line is setting the HTTP method of the AJAX request to GET.  
```data: {'query': query},```: This line is setting the data that will be sent with the AJAX request. It's sending an object with a query property that contains the value of the query variable.  
```success: function(data) {```: This line is defining a function that will be executed if the AJAX request is successful. The data parameter will contain the data returned from the server.

The ```value``` that is returned from the route "contacts.search" is a list of contacts that match the search query.
Note that anything can be returned from the route "contacts.search" i.e: view, json, etc. At first i returned the ```showcontacts``` view and tried to update the html element of 
different kinds of classes but it didn't work. So i returned the json data and updated the html element of the class custom-table tbody with the data.

