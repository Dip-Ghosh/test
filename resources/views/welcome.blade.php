
1 . What are the popular features of Laravel?*
Reverse routing
Blade template engine
Lazy collection
None

2 .What are the advantages of using the Laravel framework to build complex web applications?*
security for web resource
great performance under high server load
high flexibility
easy maintenance and support
build in authentication
receive better performance

3 What is routing?
A routing system simply maps an HTTP request to a request handler (function or method). In other words,
it defines how we navigate or access different parts of an app without the need to type the file name

How to create a route? Briefly describe with an example.
Route::get('/', function () {
return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
Route::get('/', 'index')->name('login');
});
Route::get('logout',[AuthController::class, 'logout'])->name('logout');
Route::get('logout', 'AuthController@logout')->name('logout');

What are the aggregate methods provided by the query builder in Laravel?*
count()
min()
None
max()
avg()

What is the use of the Eloquent cursor() method in Laravel? and Example*
The cursor method allows you to iterate through your database records using a cursor, which will only execute a single query.
When processing large amounts of data, the cursor method may be used to greatly reduce your memory usage:

Which types of relationships are available in Laravel Eloquent?
One to One
One to Many
Many to Many
Many to One

What do you know about Traits in Laravel?
The traits are the type of mechanism and features for
reusing the codes with the single level inheritance by using the PHP type of languages

How can we check the logged-in user info in Laravel?*
Auth::user();
auth()->user();
auth()->user()->id

What do you know about Closures in Laravel?
A Closure is an anonymous function. Closures are often used as callback methods and can be used as a parameter in a function.

function handle(Closure $closure) {
$closure('Hello World!');
}


Please find the correct the Code
$status = 'active';
$model  = Restaurant::where('restaurants.user_id', $userId)
->where(function ($custquery) use ($query) {
$custquery->where('name', 'like', '%' . $query . '%')
->orWhere('email', 'like', '%' . $query . '%')
->orWhere('location', 'like', '%' . $query . '%');
})
->where('status', $status)
->orderBy('created_at', 'DESC')
->paginate(10);

Please write the simple registration form with Ajax
1. Form
2. Save Form data in Ajax
2. Grid list in datatable in Ajax*
Add file

Please write the coding File Upload using AJax
1. Form
2. Save  Upload   data in Ajax
2. show the Image with out page reload
Add file

Please Write the Login API with Authorization*
public function login (Request $request) {
$validator = Validator::make($request->all(), [
'email' => 'required|string|email|max:255',
'password' => 'required|string|min:6|confirmed',
]);
if ($validator->fails())
{
return response(['errors'=>$validator->errors()->all()], 422);
}
$user = User::where('email', $request->email)->first();
if ($user) {
if (Hash::check($request->password, $user->password)) {
$token = $user->createToken('Laravel Password Grant Client')->accessToken;
$response = ['token' => $token];
return response($response, 200);
} else {
$response = ["message" => "Password mismatch"];
return response($response, 422);
}
} else {
$response = ["message" =>'User does not exist'];
return response($response, 422);
}
}

What is Call back function in Jquery*
Javascript code are executed line by line. however, with effects the next line of code can be run even though
the effect is not finished and this will can create errors. To prevent this we are using callback function. Because
a callback function is executed after the current effect is finished.
example :

$("button").click(function(){
$("p").hide("slow", function(){
alert("The paragraph is now hidden");
});
});

What are the jQuery functions used to provide effects?
hide(), show(), toggle(),  fadeIn(), fadeout() ,finish(),

Can you explain about ajaxStart() functions?
ajaxStart() specifies a function to be run when the ajax request start

Can you tell the difference between prop() and attr()s?
prop() is used to set or get boolean value such as checkbox on the other hand
attr() is used to get or set string value such as src attribute of a title of a tooltip

Which of the following functions has a high level of overload?
Both jQuery and $()

Which of the above jQuery techniques is used to condense the collection of matched components into just one element?

eq() method

Which is code asks for the set of all div elements in a document?
A) var divs = $(div);
B) var divs = jQuery(“div”);
C) var divs = $(“div”);
D) var divs = #(“div”);
it should be var divs = $(“div”);

Which method is used for parsing JSON text?
jQuery.parseJSON()

What is the phenomenon used in the below code?
$('#mainList').find('li') 	.width(1000).addClass('selectedElement');
Chaining


What function is used to stop your jQuery for a few milliseconds?
delay()


what is Index and How to create an Index in MySQL?
Index are used to find the rows with specific column values quickly.
Without an index, MySQL must begin with the first row and then read through the entire table to find the relevant rows.

create indexing :
CREATE INDEX user_email
on users (email);

or you can create indexing from database tools ide too.
How do you view a database in MySQL?
show databases;
or you can use any ide like navicate, datagrid, tableplus, mysqlworkbench to see databases
What are the Numeric Data Types in MySQL?
INTERGER, SMALLINT, DECIMAL, NUMERIC, FLOAT

What are the Temporal Data Types in MySQL?
DATE, DATETIME, TIME, TIMESTAMP, YEAR

How do you create and execute views in MySQL? with Query
creating view :
create view online_test as
select name, mobile, email
from users

execution:
select * from online_test

What are MySQL Triggers?
Triggers are a stored program (with queries) which is executed automatically to respond to a specific event such
as insertion, updation or deletion occurring in a table

How many Triggers are possible in MySQL? wirh Example
Before Update Trigger:
As the name implies, it is a trigger which enacts before an update is invoked. If we write an update statement, then the actions of the trigger will be performed before the update is implemented.

2. After Update Trigger:
As the name implies, this trigger is invoked after an updation occurs.

3. Before Insert Trigger:
As the name implies, this trigger is invoked before an insert, or before an insert statement is executed.


4. After Insert Trigger:
As the name implies, this trigger gets invoked after an insert is implemented.

5. Before Delete Trigger:
As the name implies, this trigger is invoked before a delete occurs, or before deletion statement is implemented.

6. After Delete Trigger:
As the name implies, this trigger is invoked after a delete occurs, or after a delete operation is implemented.

Please explin the left join and inner Join in MYSQL with Example*

Inner join is something that will return the rows  of the both tables that satisfy the conditions. Means it will give
the match data only. On the other hand left join will return the rows that present on the left side table. If there is no matches
on the right side table that time set null

Example : Suppose you have a student table and a course table where student_id is a primary key for student table and
student_id is foreign key for the course table. When you are trying to inner join that time it will give you the
particular row that are present in course and student table.

On the other hand if you are doing left join does not matter that student_id is present in the course table or not. it will
give you all the records from the student table and null will be show where student id is not present



