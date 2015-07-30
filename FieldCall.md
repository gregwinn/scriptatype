# Form Fields #
This method will allow you to place a call into the class and pull out a form helper for form fields such as "Text, Hidden, and Password".

Below is how to place the call:

**First, we include the class into the page.** Now we may make calls to the class shown below.
```
include 'class/winnscriptatype.php';
$f = new WinnScriptatype();
```

**Text Field**
```
echo $f->text(array('name'=>'user','id'=>'usrf','class'=>'fields','value'=>'user name'));

// Output
<input type="text" name="user" id="usrf" class="fields" value="user name" />
```


---

**Password Field**
```
echo $f->password(array('name'=>'user','id'=>'usrf','class'=>'fields','value'=>'user name'));

// Output
<input type="password" name="user" id="usrf" class="fields" value="user name" />
```


---

**Hidden Field**
```
echo $f->hidden(array('name'=>'user','id'=>'usrf','class'=>'fields','value'=>'user name'));

// Output
<input type="hidden" name="user" id="usrf" class="fields" value="user name" />
```