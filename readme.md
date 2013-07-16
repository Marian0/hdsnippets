# HDSnippets

- Configure database.php first

* php artisan migrate
* php artisan migrate --package=cartalyst/sentry
* php artisan db:seed

## Use Cases

- Visitors
	View Snippets
	Register an Account
	Login

- Users
	Write Snippets
	Manage his snipps
	View/Change profile, password
	Vote snipps
	Rate/Comment Snipps
	Logout




## Conventions
- Views wich cant render alone, starts with _

- All names are singular, except of the table names

- Models and Method of models ar CamelCase

- Atributes of models and controller functions are lower_case
- Foreign keys model_id
