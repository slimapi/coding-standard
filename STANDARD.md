# SlimAPI Coding Standard

## Array Indent
The opening brace of a multi-line array must be indented at least to the same level as the start of the statement.
  <table>
   <tr>
    <th>Valid: Opening brace of a multi-line array indented to the same level as the start of the statement.</th>
    <th>Invalid: Opening brace of a multi-line array not indented to the same level as the start of the statement.</th>
   </tr>
   <tr>
<td>

    $b = [
        1,
        2,
    ];
    
    if ($condition) {
        $a =
        [
            1,
            2,
        ];
    }

</td>
<td>

    if ($condition) {
        $a =
    [
            1,
            2,
        ];
    }

</td>
   </tr>
  </table>
Each array element must be indented exactly four spaces from the start of the statement.
  <table>
   <tr>
    <th>Valid: Each array element is indented by exactly four spaces.</th>
    <th>Invalid: Array elements not indented by four spaces.</th>
   </tr>
   <tr>
<td>

    $a = array(
        1,
        2,
        3,
    );

</td>
<td>

    $a = array(
      1,
         2,
            3,
    );

</td>
   </tr>
  </table>
The array closing brace must be on a new line.
  <table>
   <tr>
    <th>Valid: Array closing brace on its own line.</th>
    <th>Invalid: Array closing brace not on its own line.</th>
   </tr>
   <tr>
<td>

    $a = [
        1,
        2,
    ];

</td>
<td>

    $a = [
        1,
        2,];

</td>
   </tr>
  </table>
The closing brace must be aligned with the start of the statement containing the array opener.
  <table>
   <tr>
    <th>Valid: Closing brace aligned with the start of the statement containing the array opener.</th>
    <th>Invalid: Closing brace not aligned with the start of the statement containing the array opener.</th>
   </tr>
   <tr>
<td>

    $a = array(
        1,
        2,
    );

</td>
<td>

    $a = array(
        1,
        2,
      );

</td>
   </tr>
  </table>

## Short Array Syntax
Short array syntax must be used to define arrays.
  <table>
   <tr>
    <th>Valid: Short form of array.</th>
    <th>Invalid: Long form of array.</th>
   </tr>
   <tr>
<td>

    $arr = [
        'foo' => 'bar',
    ];

</td>
<td>

    $arr = array(
        'foo' => 'bar',
    );

</td>
   </tr>
  </table>

## Duplicate Class Names
Class and Interface names should be unique in a project.  They should never be duplicated.
  <table>
   <tr>
    <th>Valid: A unique class name.</th>
    <th>Invalid: A class duplicated (including across multiple files).</th>
   </tr>
   <tr>
<td>

    class Foo
    {
    }

</td>
<td>

    class Foo
    {
    }
    
    class Foo
    {
    }

</td>
   </tr>
  </table>

## Empty Statements
Control Structures must have at least one statement inside of the body.
  <table>
   <tr>
    <th>Valid: There is a statement inside the control structure.</th>
    <th>Invalid: The control structure has no statements.</th>
   </tr>
   <tr>
<td>

    if ($test) {
        $var = 1;
    }

</td>
<td>

    if ($test) {
        // do nothing
    }

</td>
   </tr>
  </table>

## Condition-Only For Loops
For loops that have only a second expression (the condition) should be converted to while loops.
  <table>
   <tr>
    <th>Valid: A for loop is used with all three expressions.</th>
    <th>Invalid: A for loop is used without a first or third expression.</th>
   </tr>
   <tr>
<td>

    for ($i = 0; $i < 10; $i++) {
        echo "{$i}\n";
    }

</td>
<td>

    for (;$test;) {
        $test = doSomething();
    }

</td>
   </tr>
  </table>

## For Loops With Function Calls in the Test
For loops should not call functions inside the test for the loop when they can be computed beforehand.
  <table>
   <tr>
    <th>Valid: A for loop that determines its end condition before the loop starts.</th>
    <th>Invalid: A for loop that unnecessarily computes the same value on every iteration.</th>
   </tr>
   <tr>
<td>

    $end = count($foo);
    for ($i = 0; $i < $end; $i++) {
        echo $foo[$i]."\n";
    }

</td>
<td>

    for ($i = 0; $i < count($foo); $i++) {
        echo $foo[$i]."\n";
    }

</td>
   </tr>
  </table>

## Jumbled Incrementers
Incrementers in nested loops should use different variable names.
  <table>
   <tr>
    <th>Valid: Two different variables being used to increment.</th>
    <th>Invalid: Inner incrementer is the same variable name as the outer one.</th>
   </tr>
   <tr>
<td>

    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
        }
    }

</td>
<td>

    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $i++) {
        }
    }

</td>
   </tr>
  </table>

## Unconditional If Statements
If statements that are always evaluated should not be used.
  <table>
   <tr>
    <th>Valid: An if statement that only executes conditionally.</th>
    <th>Invalid: An if statement that is always performed.</th>
   </tr>
   <tr>
<td>

    if ($test) {
        $var = 1;
    }

</td>
<td>

    if (true) {
        $var = 1;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: An if statement that only executes conditionally.</th>
    <th>Invalid: An if statement that is never performed.</th>
   </tr>
   <tr>
<td>

    if ($test) {
        $var = 1;
    }

</td>
<td>

    if (false) {
        $var = 1;
    }

</td>
   </tr>
  </table>

## Unnecessary Final Modifiers
Methods should not be declared final inside of classes that are declared final.
  <table>
   <tr>
    <th>Valid: A method in a final class is not marked final.</th>
    <th>Invalid: A method in a final class is also marked final.</th>
   </tr>
   <tr>
<td>

    final class Foo
    {
        public function bar()
        {
        }
    }

</td>
<td>

    final class Foo
    {
        public final function bar()
        {
        }
    }

</td>
   </tr>
  </table>

## Unused function parameters
All parameters in a functions signature should be used within the function.
  <table>
   <tr>
    <th>Valid: All the parameters are used.</th>
    <th>Invalid: One of the parameters is not being used.</th>
   </tr>
   <tr>
<td>

    function addThree($a, $b, $c)
    {
        return $a + $b + $c;
    }

</td>
<td>

    function addThree($a, $b, $c)
    {
        return $a + $b;
    }

</td>
   </tr>
  </table>

## Useless Overriding Methods
Methods should not be defined that only call the parent method.
  <table>
   <tr>
    <th>Valid: A method that extends functionality on a parent method.</th>
    <th>Invalid: An overriding method that only calls the parent.</th>
   </tr>
   <tr>
<td>

    final class Foo
    {
        public function bar()
        {
            parent::bar();
            $this->doSomethingElse();
        }
    }

</td>
<td>

    final class Foo
    {
        public function bar()
        {
            parent::bar();
        }
    }

</td>
   </tr>
  </table>

## Inline Control Structures
Control Structures should use braces.
  <table>
   <tr>
    <th>Valid: Braces are used around the control structure.</th>
    <th>Invalid: No braces are used for the control structure..</th>
   </tr>
   <tr>
<td>

    if ($test) {
        $var = 1;
    }

</td>
<td>

    if ($test)
        $var = 1;

</td>
   </tr>
  </table>

## Byte Order Marks
Byte Order Marks that may corrupt your application should not be used.  These include 0xefbbbf (UTF-8), 0xfeff (UTF-16 BE) and 0xfffe (UTF-16 LE).

## End of File Newline
Files should end with a newline character.

## Inline HTML
Files that contain PHP code should only have PHP code and should not have any &quot;inline html&quot;.
  <table>
   <tr>
    <th>Valid: A PHP file with only PHP code in it.</th>
    <th>Invalid: A PHP file with html in it outside of the PHP tags.</th>
   </tr>
   <tr>
<td>

    <?php
    $foo = 'bar';
    echo $foo . 'baz';

</td>
<td>

    some string here
    <?php
    $foo = 'bar';
    echo $foo . 'baz';

</td>
   </tr>
  </table>

## Line Endings
Unix-style line endings are preferred (&quot;\n&quot; instead of &quot;\r\n&quot;).

## Line Length
It is recommended to keep lines at approximately 80 characters long for better code readability.

## One Class Per File
There should only be one class defined in a file.
  <table>
   <tr>
    <th>Valid: Only one class in the file.</th>
    <th>Invalid: Multiple classes defined in one file.</th>
   </tr>
   <tr>
<td>

    <?php
    class Foo
    {
    }

</td>
<td>

    <?php
    class Foo
    {
    }
    
    class Bar
    {
    }

</td>
   </tr>
  </table>

## One Interface Per File
There should only be one interface defined in a file.
  <table>
   <tr>
    <th>Valid: Only one interface in the file.</th>
    <th>Invalid: Multiple interfaces defined in one file.</th>
   </tr>
   <tr>
<td>

    <?php
    interface Foo
    {
    }

</td>
<td>

    <?php
    interface Foo
    {
    }
    
    interface Bar
    {
    }

</td>
   </tr>
  </table>

## One Trait Per File
There should only be one trait defined in a file.
  <table>
   <tr>
    <th>Valid: Only one trait in the file.</th>
    <th>Invalid: Multiple traits defined in one file.</th>
   </tr>
   <tr>
<td>

    <?php
    trait Foo
    {
    }

</td>
<td>

    <?php
    trait Foo
    {
    }
    
    trait Bar
    {
    }

</td>
   </tr>
  </table>

## Multiple Statements On a Single Line
Multiple statements are not allowed on a single line.
  <table>
   <tr>
    <th>Valid: Two statements are spread out on two separate lines.</th>
    <th>Invalid: Two statements are combined onto one line.</th>
   </tr>
   <tr>
<td>

    $foo = 1;
    $bar = 2;

</td>
<td>

    $foo = 1; $bar = 2;

</td>
   </tr>
  </table>

## Space After Cast
Exactly one space is allowed after a cast.
  <table>
   <tr>
    <th>Valid: A cast operator is followed by one space.</th>
    <th>Invalid: A cast operator is not followed by whitespace.</th>
   </tr>
   <tr>
<td>

    $foo = (string) 1;

</td>
<td>

    $foo = (string)1;

</td>
   </tr>
  </table>

## Call-Time Pass-By-Reference
Call-time pass-by-reference is not allowed. It should be declared in the function definition.
  <table>
   <tr>
    <th>Valid: Pass-by-reference is specified in the function definition.</th>
    <th>Invalid: Pass-by-reference is done in the call to a function.</th>
   </tr>
   <tr>
<td>

    function foo(&$bar)
    {
        $bar++;
    }
    
    $baz = 1;
    foo($baz);

</td>
<td>

    function foo($bar)
    {
        $bar++;
    }
    
    $baz = 1;
    foo(&$baz);

</td>
   </tr>
  </table>

## Function Argument Spacing
Function arguments should have one space after a comma, and single spaces surrounding the equals sign for default values.
  <table>
   <tr>
    <th>Valid: Single spaces after a comma.</th>
    <th>Invalid: No spaces after a comma.</th>
   </tr>
   <tr>
<td>

    function foo($bar, $baz)
    {
    }

</td>
<td>

    function foo($bar,$baz)
    {
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Single spaces around an equals sign in function declaration.</th>
    <th>Invalid: No spaces around an equals sign in function declaration.</th>
   </tr>
   <tr>
<td>

    function foo($bar, $baz = true)
    {
    }

</td>
<td>

    function foo($bar, $baz=true)
    {
    }

</td>
   </tr>
  </table>

## Opening Brace in Function Declarations
Function declarations follow the &quot;BSD/Allman style&quot;. The function brace is on the line following the function declaration and is indented to the same column as the start of the function declaration.
  <table>
   <tr>
    <th>Valid: Brace on next line.</th>
    <th>Invalid: Brace on same line.</th>
   </tr>
   <tr>
<td>

    function fooFunction($arg1, $arg2 = '')
    {
        ...
    }

</td>
<td>

    function fooFunction($arg1, $arg2 = '') {
        ...
    }

</td>
   </tr>
  </table>

## Cyclomatic Complexity
Functions should not have a cyclomatic complexity greater than 20, and should try to stay below a complexity of 10.

## Nesting Level
Functions should not have a nesting level greater than 10, and should try to stay below 5.

## Constructor name
Constructors should be named __construct, not after the class.
  <table>
   <tr>
    <th>Valid: The constructor is named __construct.</th>
    <th>Invalid: The old style class name constructor is used.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        function __construct()
        {
        }
    }

</td>
<td>

    class Foo
    {
        function Foo()
        {
        }
    }

</td>
   </tr>
  </table>

## Constant Names
Constants should always be all-uppercase, with underscores to separate words.
  <table>
   <tr>
    <th>Valid: All uppercase constant name.</th>
    <th>Invalid: Mixed case or lowercase constant name.</th>
   </tr>
   <tr>
<td>

    define('FOO_CONSTANT', 'foo');
    
    class FooClass
    {
        const FOO_CONSTANT = 'foo';
    }

</td>
<td>

    define('Foo_Constant', 'foo');
    
    class FooClass
    {
        const foo_constant = 'foo';
    }

</td>
   </tr>
  </table>

## Backtick Operator
Disallow the use of the backtick operator for execution of shell commands.

## Opening Tag at Start of File
The opening PHP tag should be the first item in the file.
  <table>
   <tr>
    <th>Valid: A file starting with an opening PHP tag.</th>
    <th>Invalid: A file with content before the opening PHP tag.</th>
   </tr>
   <tr>
<td>

    <?php
    echo 'Foo';

</td>
<td>

    Beginning content
    <?php
    echo 'Foo';

</td>
   </tr>
  </table>

## Deprecated Functions
Deprecated functions should not be used.
  <table>
   <tr>
    <th>Valid: A non-deprecated function is used.</th>
    <th>Invalid: A deprecated function is used.</th>
   </tr>
   <tr>
<td>

    $foo = explode('a', $bar);

</td>
<td>

    $foo = split('a', $bar);

</td>
   </tr>
  </table>

## Alternative PHP Code Tags
Always use &lt;?php ?&gt; to delimit PHP code, do not use the ASP &lt;% %&gt; style tags nor the &lt;script language=&quot;php&quot;&gt;&lt;/script&gt; tags. This is the most portable way to include PHP code on differing operating systems and setups.

## PHP Code Tags
Always use &lt;?php ?&gt; to delimit PHP code, not the &lt;? ?&gt; shorthand. This is the most portable way to include PHP code on differing operating systems and setups.

## Forbidden Functions
The forbidden functions sizeof() and delete() should not be used.
  <table>
   <tr>
    <th>Valid: count() is used in place of sizeof().</th>
    <th>Invalid: sizeof() is used.</th>
   </tr>
   <tr>
<td>

    $foo = count($bar);

</td>
<td>

    $foo = sizeof($bar);

</td>
   </tr>
  </table>

## Lowercase PHP Constants
The *true*, *false* and *null* constants must always be lowercase.
  <table>
   <tr>
    <th>Valid: Lowercase constants.</th>
    <th>Invalid: Uppercase constants.</th>
   </tr>
   <tr>
<td>

    if ($var === false || $var === null) {
        $var = true;
    }

</td>
<td>

    if ($var === FALSE || $var === NULL) {
        $var = TRUE;
    }

</td>
   </tr>
  </table>

## Lowercase Keywords
All PHP keywords should be lowercase.
  <table>
   <tr>
    <th>Valid: Lowercase array keyword used.</th>
    <th>Invalid: Non-lowercase array keyword used.</th>
   </tr>
   <tr>
<td>

    $foo = array();

</td>
<td>

    $foo = Array();

</td>
   </tr>
  </table>

## Lowercase PHP Types
All PHP types used for parameter type and return type declarations should be lowercase.
  <table>
   <tr>
    <th>Valid: Lowercase type declarations used.</th>
    <th>Invalid: Non-lowercase type declarations used.</th>
   </tr>
   <tr>
<td>

    function myFunction(int $foo) : string {
    }

</td>
<td>

    function myFunction(Int $foo) : STRING {
    }

</td>
   </tr>
  </table>
All PHP types used for type casting should be lowercase.
  <table>
   <tr>
    <th>Valid: Lowercase type used.</th>
    <th>Invalid: Non-lowercase type used.</th>
   </tr>
   <tr>
<td>

    $foo = (bool) $isValid;

</td>
<td>

    $foo = (BOOL) $isValid;

</td>
   </tr>
  </table>

## Silenced Errors
Suppressing Errors is not allowed.
  <table>
   <tr>
    <th>Valid: isset() is used to verify that a variable exists before trying to use it.</th>
    <th>Invalid: Errors are suppressed.</th>
   </tr>
   <tr>
<td>

    if (isset($foo) && $foo) {
        echo "Hello\n";
    }

</td>
<td>

    if (@$foo) {
        echo "Hello\n";
    }

</td>
   </tr>
  </table>

## SAPI Usage
The PHP_SAPI constant should be used instead of php_sapi_name().
  <table>
   <tr>
    <th>Valid: PHP_SAPI is used.</th>
    <th>Invalid: Function call to php_sapi_name() is used.</th>
   </tr>
   <tr>
<td>

    if (PHP_SAPI === 'cli') {
        echo "Hello, CLI user.";
    }

</td>
<td>

    if (php_sapi_name() === 'cli') {
        echo "Hello, CLI user.";
    }

</td>
   </tr>
  </table>

## Unnecessary Heredoc
If no interpolation or expressions are used in the body of a heredoc, nowdoc syntax should be used instead.
  <table>
   <tr>
    <th>Valid: Using nowdoc syntax for a text string without any interpolation or expressions.</th>
    <th>Invalid: Using heredoc syntax for a text string without any interpolation or expressions.</th>
   </tr>
   <tr>
<td>

    $nowdoc = <<<'EOD'
    some text
    EOD;

</td>
<td>

    $heredoc = <<<EOD
    some text
    EOD;

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Using heredoc syntax for a text string containing interpolation or expressions.</th>
    <th>Invalid: Using heredoc syntax for a text string without any interpolation or expressions.</th>
   </tr>
   <tr>
<td>

    $heredoc = <<<"EOD"
    some $text
    EOD;

</td>
<td>

    $heredoc = <<<"EOD"
    some text
    EOD;

</td>
   </tr>
  </table>

## Unnecessary String Concatenation
Strings should not be concatenated together.
  <table>
   <tr>
    <th>Valid: A string can be concatenated with an expression.</th>
    <th>Invalid: Strings should not be concatenated together.</th>
   </tr>
   <tr>
<td>

    echo '5 + 2 = ' . (5 + 2);

</td>
<td>

    echo 'Hello' . ' ' . 'World';

</td>
   </tr>
  </table>

## Arbitrary Parentheses Spacing
Arbitrary sets of parentheses should have no spaces inside.
  <table>
   <tr>
    <th>Valid: No spaces on the inside of a set of arbitrary parentheses.</th>
    <th>Invalid: Spaces or new lines on the inside of a set of arbitrary parentheses.</th>
   </tr>
   <tr>
<td>

    $a = (null !== $extra);

</td>
<td>

    $a = ( null !== $extra );
    
    $a = (
        null !== $extra
    );

</td>
   </tr>
  </table>

## No Tab Indentation
Spaces should be used for indentation instead of tabs.

## Heredoc Nowdoc Identifier Spacing
There should be no space between the &lt;&lt;&lt; and the heredoc/nowdoc identifier string.
  <table>
   <tr>
    <th>Valid: No space between the <<< and the identifier string.</th>
    <th>Invalid: Whitespace between the <<< and the identifier string.</th>
   </tr>
   <tr>
<td>

    $heredoc = <<<EOD
    some text
    EOD;

</td>
<td>

    $heredoc = <<<   END
    some text
    END;

</td>
   </tr>
  </table>

## Increment Decrement Spacing
There should be no whitespace between variables and increment/decrement operators.
  <table>
   <tr>
    <th>Valid: No whitespace between variables and increment/decrement operators.</th>
    <th>Invalid: Whitespace between variables and increment/decrement operators.</th>
   </tr>
   <tr>
<td>

    ++$i;
    --$i['key']['id'];
    ClassName::$prop++;
    $obj->prop--;

</td>
<td>

    ++ $i;
    --   $i['key']['id'];
    ClassName::$prop    ++;
    $obj->prop
    --;

</td>
   </tr>
  </table>

## Language Construct Spacing
Language constructs that can be used without parentheses, must have a single space between the language construct keyword and its content.
  <table>
   <tr>
    <th>Valid: Single space after language construct.</th>
    <th>Invalid: No space, more than one space or newline after language construct.</th>
   </tr>
   <tr>
<td>

    echo 'Hello, World!';
    throw new Exception();
    return $newLine;

</td>
<td>

    echo'Hello, World!';
    throw   new   Exception();
    return
    $newLine;

</td>
   </tr>
  </table>
A single space must be used between the &quot;yield&quot; and &quot;from&quot; keywords for a &quot;yield from&quot; expression.
  <table>
   <tr>
    <th>Valid: Single space between yield and from.</th>
    <th>Invalid: No space, more than one space or newline between yield and from.</th>
   </tr>
   <tr>
<td>

    yield from [1, 2, 3];

</td>
<td>

    yieldfrom [1, 2, 3];
    yield  from [1, 2, 3];
    yield
    from [1, 2, 3];

</td>
   </tr>
  </table>

## Scope Indentation
Indentation for control structures, classes, and functions should be 4 spaces per level.
  <table>
   <tr>
    <th>Valid: 4 spaces are used to indent a control structure.</th>
    <th>Invalid: 8 spaces are used to indent a control structure.</th>
   </tr>
   <tr>
<td>

    if ($test) {
        $var = 1;
    }

</td>
<td>

    if ($test) {
            $var = 1;
    }

</td>
   </tr>
  </table>

## Class Declarations
The opening brace of a class must be on the line after the definition by itself.
  <table>
   <tr>
    <th>Valid: Opening brace on the correct line.</th>
    <th>Invalid: Opening brace on same line as declaration.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
    }

</td>
<td>

    class Foo {
    }

</td>
   </tr>
  </table>

## Inline Comments
Perl-style # comments are not allowed.
  <table>
   <tr>
    <th>Valid: A // style comment.</th>
    <th>Invalid: A # style comment.</th>
   </tr>
   <tr>
<td>

    // A comment.

</td>
<td>

    # A comment.

</td>
   </tr>
  </table>

## Control Structure Signatures
Control structures should use one space around the parentheses in conditions.  The opening brace should be preceded by one space and should be at the end of the line.
  <table>
   <tr>
    <th>Valid: Correct spacing around the condition.</th>
    <th>Invalid: Incorrect spacing around the condition.</th>
   </tr>
   <tr>
<td>

    if ($foo) {
    }

</td>
<td>

    if($foo){
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Correct placement of the opening brace.</th>
    <th>Invalid: Incorrect placement of the opening brace on a new line.</th>
   </tr>
   <tr>
<td>

    if ($foo) {
    }

</td>
<td>

    if ($foo)
    {
    }

</td>
   </tr>
  </table>

## Multi-Line Assignment
Multi-line assignment should have the equals sign be the first item on the second line indented correctly.
  <table>
   <tr>
    <th>Valid: Assignment operator at the start of the second line.</th>
    <th>Invalid: Assignment operator at end of first line.</th>
   </tr>
   <tr>
<td>

    $foo
        = $bar;

</td>
<td>

    $foo =
        $bar;

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Assignment operator indented one level.</th>
    <th>Invalid: Assignment operator not indented.</th>
   </tr>
   <tr>
<td>

    $foo
        = $bar;

</td>
<td>

    $foo
    = $bar;

</td>
   </tr>
  </table>

## Default Values in Function Declarations
Arguments with default values go at the end of the argument list.
  <table>
   <tr>
    <th>Valid: Argument with default value at end of declaration.</th>
    <th>Invalid: Argument with default value at start of declaration.</th>
   </tr>
   <tr>
<td>

    function connect($dsn, $persistent = false)
    {
        ...
    }

</td>
<td>

    function connect($persistent = false, $dsn)
    {
        ...
    }

</td>
   </tr>
  </table>

## Object Operator Indentation
Chained object operators when spread out over multiple lines should be the first thing on the line and be indented by 1 level.
  <table>
   <tr>
    <th>Valid: Object operator at the start of a new line.</th>
    <th>Invalid: Object operator at the end of the line.</th>
   </tr>
   <tr>
<td>

    $foo
        ->bar()
        ->baz();

</td>
<td>

    $foo->
        bar()->
        baz();

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Object operator indented correctly.</th>
    <th>Invalid: Object operator not indented correctly.</th>
   </tr>
   <tr>
<td>

    $foo
        ->bar()
        ->baz();

</td>
<td>

    $foo
    ->bar()
    ->baz();

</td>
   </tr>
  </table>

## Class Declaration
Each class must be in a file by itself and must be under a namespace (a top-level vendor name).
  <table>
   <tr>
    <th>Valid: One class in a file.</th>
    <th>Invalid: Multiple classes in a single file.</th>
   </tr>
   <tr>
<td>

    <?php
    namespace Foo;
    
    class Bar {
    }

</td>
<td>

    <?php
    namespace Foo;
    
    class Bar {
    }
    
    class Baz {
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: A vendor-level namespace is used.</th>
    <th>Invalid: No namespace used in file.</th>
   </tr>
   <tr>
<td>

    <?php
    namespace Foo;
    
    class Bar {
    }

</td>
<td>

    <?php
    class Bar {
    }

</td>
   </tr>
  </table>

## Side Effects
A PHP file should either contain declarations with no side effects, or should just have logic (including side effects) with no declarations.
  <table>
   <tr>
    <th>Valid: A class defined in a file by itself.</th>
    <th>Invalid: A class defined in a file with other code.</th>
   </tr>
   <tr>
<td>

    <?php
    class Foo
    {
    }

</td>
<td>

    <?php
    class Foo
    {
    }
    
    echo "Class Foo loaded."

</td>
   </tr>
  </table>

## Method Name
Method names MUST be declared in camelCase.
  <table>
   <tr>
    <th>Valid: Method name in camelCase.</th>
    <th>Invalid: Method name not in camelCase.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        private function doBar()
        {
        }
    }

</td>
<td>

    class Foo
    {
        private function do_bar()
        {
        }
    }

</td>
   </tr>
  </table>

## Class Declarations
There should be exactly 1 space between the abstract or final keyword and the class keyword and between the class keyword and the class name.  The extends and implements keywords, if present, must be on the same line as the class name.  When interfaces implemented are spread over multiple lines, there should be exactly 1 interface mentioned per line indented by 1 level.  The closing brace of the class must go on the first line after the body of the class and must be on a line by itself.
  <table>
   <tr>
    <th>Valid: Correct spacing around class keyword.</th>
    <th>Invalid: 2 spaces used around class keyword.</th>
   </tr>
   <tr>
<td>

    abstract class Foo
    {
    }

</td>
<td>

    abstract  class  Foo
    {
    }

</td>
   </tr>
  </table>

## Property Declarations
Property names should not be prefixed with an underscore to indicate visibility.  Visibility should be used to declare properties rather than the var keyword.  Only one property should be declared within a statement.  The static declaration must come after the visibility declaration.
  <table>
   <tr>
    <th>Valid: Correct property naming.</th>
    <th>Invalid: An underscore prefix used to indicate visibility.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        private $bar;
    }

</td>
<td>

    class Foo
    {
        private $_bar;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Visibility of property declared.</th>
    <th>Invalid: Var keyword used to declare property.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        private $bar;
    }

</td>
<td>

    class Foo
    {
        var $bar;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: One property declared per statement.</th>
    <th>Invalid: Multiple properties declared in one statement.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        private $bar;
        private $baz;
    }

</td>
<td>

    class Foo
    {
        private $bar, $baz;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: If declared as static, the static declaration must come after the visibility declaration.</th>
    <th>Invalid: Static declaration before the visibility declaration.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        public static $bar;
        private $baz;
    }

</td>
<td>

    class Foo
    {
        static protected $bar;
    }

</td>
   </tr>
  </table>

## Control Structure Spacing
Control Structures should have 0 spaces after opening parentheses and 0 spaces before closing parentheses.
  <table>
   <tr>
    <th>Valid: Correct spacing.</th>
    <th>Invalid: Whitespace used inside the parentheses.</th>
   </tr>
   <tr>
<td>

    if ($foo) {
        $var = 1;
    }

</td>
<td>

    if ( $foo ) {
        $var = 1;
    }

</td>
   </tr>
  </table>

## Elseif Declarations
PHP&#039;s elseif keyword should be used instead of else if.
  <table>
   <tr>
    <th>Valid: Single word elseif keyword used.</th>
    <th>Invalid: Separate else and if keywords used.</th>
   </tr>
   <tr>
<td>

    if ($foo) {
        $var = 1;
    } elseif ($bar) {
        $var = 2;
    }

</td>
<td>

    if ($foo) {
        $var = 1;
    } else if ($bar) {
        $var = 2;
    }

</td>
   </tr>
  </table>

## Switch Declarations
Case statements should be indented 4 spaces from the switch keyword.  It should also be followed by a space.  Colons in switch declarations should not be preceded by whitespace.  Break statements should be indented 4 more spaces from the case statement.  There must be a comment when falling through from one case into the next.
  <table>
   <tr>
    <th>Valid: Case statement indented correctly.</th>
    <th>Invalid: Case statement not indented 4 spaces.</th>
   </tr>
   <tr>
<td>

    switch ($foo) {
        case 'bar':
            break;
    }

</td>
<td>

    switch ($foo) {
    case 'bar':
        break;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Case statement followed by 1 space.</th>
    <th>Invalid: Case statement not followed by 1 space.</th>
   </tr>
   <tr>
<td>

    switch ($foo) {
        case 'bar':
            break;
    }

</td>
<td>

    switch ($foo) {
        case'bar':
            break;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Colons not prefixed by whitespace.</th>
    <th>Invalid: Colons prefixed by whitespace.</th>
   </tr>
   <tr>
<td>

    switch ($foo) {
        case 'bar':
            break;
        default:
            break;
    }

</td>
<td>

    switch ($foo) {
        case 'bar' :
            break;
        default :
            break;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Break statement indented correctly.</th>
    <th>Invalid: Break statement not indented 4 spaces.</th>
   </tr>
   <tr>
<td>

    switch ($foo) {
        case 'bar':
            break;
    }

</td>
<td>

    switch ($foo) {
        case 'bar':
        break;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Comment marking intentional fall-through.</th>
    <th>Invalid: No comment marking intentional fall-through.</th>
   </tr>
   <tr>
<td>

    switch ($foo) {
        case 'bar':
        // no break
        default:
            break;
    }

</td>
<td>

    switch ($foo) {
        case 'bar':
        default:
            break;
    }

</td>
   </tr>
  </table>

## Closing Tag
Checks that the file does not end with a closing tag.
  <table>
   <tr>
    <th>Valid: Closing tag not used.</th>
    <th>Invalid: Closing tag used.</th>
   </tr>
   <tr>
<td>

    <?php
    echo 'Foo';
    

</td>
<td>

    <?php
    echo 'Foo';
    ?>

</td>
   </tr>
  </table>

## End File Newline
PHP Files should end with exactly one newline.

## Function Call Signature
Checks that the function call format is correct.
  <table>
   <tr>
    <th>Valid: Correct spacing is used around parentheses.</th>
    <th>Invalid: Incorrect spacing used, too much space around the parentheses.</th>
   </tr>
   <tr>
<td>

    foo($bar, $baz);

</td>
<td>

    foo ( $bar, $baz );

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Correct number of spaces used for indent in a multi-line function call.</th>
    <th>Invalid: Incorrect number of spaces used for indent in a multi-line function call.</th>
   </tr>
   <tr>
<td>

    foo(
        $bar,
        $baz
    );

</td>
<td>

    foo(
      $bar,
          $baz
    );

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Closing parenthesis for a multi-line function call is on a new line after the last parameter.</th>
    <th>Invalid: Closing parenthesis for a multi-line function call is not on a new line after the last parameter.</th>
   </tr>
   <tr>
<td>

    foo(
        $bar,
        $baz
    );

</td>
<td>

    foo(
        $bar,
        $baz);

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: The first argument of a multi-line function call is on a new line.</th>
    <th>Invalid: The first argument of a multi-line function call is not on a new line.</th>
   </tr>
   <tr>
<td>

    foo(
        $bar,
        $baz
    );

</td>
<td>

    foo($bar,
        $baz
    );

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Only one argument per line in a multi-line function call.</th>
    <th>Invalid: Two or more arguments per line in a multi-line function call.</th>
   </tr>
   <tr>
<td>

    foo(
        $bar,
        $baz
    );

</td>
<td>

    foo(
        $bar, $baz
    );

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: No blank lines in a multi-line function call.</th>
    <th>Invalid: Blank line in multi-line function call.</th>
   </tr>
   <tr>
<td>

    foo(
        $bar,
        $baz
    );

</td>
<td>

    foo(
        $bar,
    
        $baz
    );

</td>
   </tr>
  </table>

## Function Closing Brace
Checks that the closing brace of a function goes directly after the body.
  <table>
   <tr>
    <th>Valid: Closing brace directly follows the function body.</th>
    <th>Invalid: Blank line between the function body and the closing brace.</th>
   </tr>
   <tr>
<td>

    function foo()
    {
        echo 'foo';
    }

</td>
<td>

    function foo()
    {
        echo 'foo';
    
    }

</td>
   </tr>
  </table>

## Method Declarations
Method names should not be prefixed with an underscore to indicate visibility.  The static keyword, when present, should come after the visibility declaration, and the final and abstract keywords should come before.
  <table>
   <tr>
    <th>Valid: Correct method naming.</th>
    <th>Invalid: An underscore prefix used to indicate visibility.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        private function bar()
        {
        }
    }

</td>
<td>

    class Foo
    {
        private function _bar()
        {
        }
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Correct ordering of method prefixes.</th>
    <th>Invalid: `static` keyword used before visibility and final used after.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        final public static function bar()
        {
        }
    }

</td>
<td>

    class Foo
    {
        static public final function bar()
        {
        }
    }

</td>
   </tr>
  </table>

## Namespace Declarations
There must be one blank line after the namespace declaration.
  <table>
   <tr>
    <th>Valid: One blank line after the namespace declaration.</th>
    <th>Invalid: No blank line after the namespace declaration.</th>
   </tr>
   <tr>
<td>

    namespace \Foo\Bar;
    
    use \Baz;

</td>
<td>

    namespace \Foo\Bar;
    use \Baz;

</td>
   </tr>
  </table>

## Namespace Declarations
Each use declaration must contain only one namespace and must come after the first namespace declaration.  There should be one blank line after the final use statement.
  <table>
   <tr>
    <th>Valid: One use declaration per namespace.</th>
    <th>Invalid: Multiple namespaces in a use declaration.</th>
   </tr>
   <tr>
<td>

    use \Foo;
    use \Bar;

</td>
<td>

    use \Foo, \Bar;

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Use statements come after first namespace.</th>
    <th>Invalid: Namespace declared after use.</th>
   </tr>
   <tr>
<td>

    namespace \Foo;
    
    use \Bar;

</td>
<td>

    use \Bar;
    
    namespace \Foo;

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: A single blank line after the final use statement.</th>
    <th>Invalid: No blank line after the final use statement.</th>
   </tr>
   <tr>
<td>

    use \Foo;
    use \Bar;
    
    class Baz
    {
    }

</td>
<td>

    use \Foo;
    use \Bar;
    class Baz
    {
    }

</td>
   </tr>
  </table>

## Array Bracket Spacing
When referencing arrays you should not put whitespace around the opening bracket or before the closing bracket.
  <table>
   <tr>
    <th>Valid: No spaces around the brackets.</th>
    <th>Invalid: Spaces around the brackets.</th>
   </tr>
   <tr>
<td>

    $foo['bar'];

</td>
<td>

    $foo [ 'bar' ];

</td>
   </tr>
  </table>

## Array Declarations
This standard covers all array declarations, regardless of the number and type of values contained within the array.
The *array* keyword must be lowercase.
  <table>
   <tr>
    <th>Valid: Array keyword lowercase.</th>
    <th>Invalid: First letter capitalised.</th>
   </tr>
   <tr>
<td>

    $array = array('val1', 'val2');

</td>
<td>

    $array = Array('val1', 'val2');

</td>
   </tr>
  </table>
The first array key must begin on the line after the *array* keyword.
  <table>
   <tr>
    <th>Valid: First key on second line.</th>
    <th>Invalid: First key on same line.</th>
   </tr>
   <tr>
<td>

    $array = array(
              'key1' => 'value1',
              'key2' => 'value2',
             );

</td>
<td>

    $array = array('key1' => 'value1',
              'key2' => 'value2',
             );

</td>
   </tr>
  </table>
All array keys must be indented to one space after the start of the *array* keyword. The closing parenthesis must be aligned with the start of the *array* keyword.
  <table>
   <tr>
    <th>Valid: Aligned correctly.</th>
    <th>Invalid: Keys and parenthesis aligned incorrectly.</th>
   </tr>
   <tr>
<td>

    $array = array(
              'key1' => 'value1',
              'key2' => 'value2',
             );

</td>
<td>

    $array = array(
             'key1' => 'value1',
             'key2' => 'value2',
    );

</td>
   </tr>
  </table>
All double arrow symbols must be aligned to one space after the longest array key. Alignment must be achieved using spaces.
  <table>
   <tr>
    <th>Valid: Keys and values aligned.</th>
    <th>Invalid: Alignment incorrect.</th>
   </tr>
   <tr>
<td>

    $array = array(
              'keyTen'    => 'ValueTen',
              'keyTwenty' => 'ValueTwenty',
             );

</td>
<td>

    $array = array(
              'keyTen' => 'ValueTen',
              'keyTwenty' => 'ValueTwenty',
             );

</td>
   </tr>
  </table>
All array values must be followed by a comma, including the final value.
  <table>
   <tr>
    <th>Valid: Comma after each value.</th>
    <th>Invalid: No comma after last value.</th>
   </tr>
   <tr>
<td>

    $array = array(
              'key1' => 'value1',
              'key2' => 'value2',
              'key3' => 'value3',
             );

</td>
<td>

    $array = array(
              'key1' => 'value1',
              'key2' => 'value2',
              'key3' => 'value3' 
             );

</td>
   </tr>
  </table>

## Lowercase Class Keywords
The PHP keywords class, interface, trait, extends, implements, abstract, final, var, and const should be lowercase.
  <table>
   <tr>
    <th>Valid: Lowercase class keywords.</th>
    <th>Invalid: Initial capitalization of class keywords.</th>
   </tr>
   <tr>
<td>

    final class Foo extends Bar
    {
    }

</td>
<td>

    Final Class Foo Extends Bar
    {
    }

</td>
   </tr>
  </table>

## Self Member Reference
The self keyword should be used instead of the current class name, should be lowercase, and should not have spaces before or after it.
  <table>
   <tr>
    <th>Valid: Lowercase self used.</th>
    <th>Invalid: Uppercase self used.</th>
   </tr>
   <tr>
<td>

    self::foo();

</td>
<td>

    SELF::foo();

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Correct spacing used.</th>
    <th>Invalid: Incorrect spacing used.</th>
   </tr>
   <tr>
<td>

    self::foo();

</td>
<td>

    self :: foo();

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Self used as reference.</th>
    <th>Invalid: Local class name used as reference.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        public static function bar()
        {
        }
    
        public static function baz()
        {
            self::bar();
        }
    }

</td>
<td>

    class Foo
    {
        public static function bar()
        {
        }
    
        public static function baz()
        {
            Foo::bar();
        }
    }

</td>
   </tr>
  </table>

## Doc Comment Alignment
The asterisks in a doc comment should align, and there should be one space between the asterisk and tags.
  <table>
   <tr>
    <th>Valid: Asterisks are aligned.</th>
    <th>Invalid: Asterisks are not aligned.</th>
   </tr>
   <tr>
<td>

    /**
     * @see foo()
     */

</td>
<td>

    /**
      * @see foo()
    */

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: One space between asterisk and tag.</th>
    <th>Invalid: Incorrect spacing used.</th>
   </tr>
   <tr>
<td>

    /**
     * @see foo()
     */

</td>
<td>

    /**
     *  @see foo()
     */

</td>
   </tr>
  </table>

## Foreach Loop Declarations
There should be a space between each element of a foreach loop and the as keyword should be lowercase.
  <table>
   <tr>
    <th>Valid: Correct spacing used.</th>
    <th>Invalid: Invalid spacing used.</th>
   </tr>
   <tr>
<td>

    foreach ($foo as $bar => $baz) {
        echo $baz;
    }

</td>
<td>

    foreach ( $foo  as  $bar=>$baz ) {
        echo $baz;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Lowercase as keyword.</th>
    <th>Invalid: Uppercase as keyword.</th>
   </tr>
   <tr>
<td>

    foreach ($foo as $bar => $baz) {
        echo $baz;
    }

</td>
<td>

    foreach ($foo AS $bar => $baz) {
        echo $baz;
    }

</td>
   </tr>
  </table>

## For Loop Declarations
In a for loop declaration, there should be no space inside the brackets and there should be 0 spaces before and 1 space after semicolons.
  <table>
   <tr>
    <th>Valid: Correct spacing used.</th>
    <th>Invalid: Invalid spacing used inside brackets.</th>
   </tr>
   <tr>
<td>

    for ($i = 0; $i < 10; $i++) {
        echo $i;
    }

</td>
<td>

    for ( $i = 0; $i < 10; $i++ ) {
        echo $i;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Correct spacing used.</th>
    <th>Invalid: Invalid spacing used before semicolons.</th>
   </tr>
   <tr>
<td>

    for ($i = 0; $i < 10; $i++) {
        echo $i;
    }

</td>
<td>

    for ($i = 0 ; $i < 10 ; $i++) {
        echo $i;
    }

</td>
   </tr>
  </table>
  <table>
   <tr>
    <th>Valid: Correct spacing used.</th>
    <th>Invalid: Invalid spacing used after semicolons.</th>
   </tr>
   <tr>
<td>

    for ($i = 0; $i < 10; $i++) {
        echo $i;
    }

</td>
<td>

    for ($i = 0;$i < 10;$i++) {
        echo $i;
    }

</td>
   </tr>
  </table>

## Lowercase Control Structure Keywords
The PHP keywords if, else, elseif, foreach, for, do, switch, while, try, and catch should be lowercase.
  <table>
   <tr>
    <th>Valid: Lowercase if keyword.</th>
    <th>Invalid: Uppercase if keyword.</th>
   </tr>
   <tr>
<td>

    if ($foo) {
        $bar = true;
    }

</td>
<td>

    IF ($foo) {
        $bar = true;
    }

</td>
   </tr>
  </table>

## Lowercase Function Keywords
The PHP keywords function, public, private, protected, and static should be lowercase.
  <table>
   <tr>
    <th>Valid: Lowercase function keyword.</th>
    <th>Invalid: Uppercase function keyword.</th>
   </tr>
   <tr>
<td>

    function foo()
    {
        return true;
    }

</td>
<td>

    FUNCTION foo()
    {
        return true;
    }

</td>
   </tr>
  </table>

## Static This Usage
Static methods should not use $this.
  <table>
   <tr>
    <th>Valid: Using self:: to access static variables.</th>
    <th>Invalid: Using $this-> to access static variables.</th>
   </tr>
   <tr>
<td>

    class Foo
    {
        static function bar()
        {
            return self::$staticMember;
        }
    }

</td>
<td>

    class Foo
    {
        static function bar()
        {
        return $this->$staticMember;
        }
    }

</td>
   </tr>
  </table>

## Echoed Strings
Simple strings should not be enclosed in parentheses when being echoed.
  <table>
   <tr>
    <th>Valid: Using echo without parentheses.</th>
    <th>Invalid: Using echo with parentheses.</th>
   </tr>
   <tr>
<td>

    echo "Hello";

</td>
<td>

    echo("Hello");

</td>
   </tr>
  </table>

## Cast Whitespace
Casts should not have whitespace inside the parentheses.
  <table>
   <tr>
    <th>Valid: No spaces.</th>
    <th>Invalid: Whitespace used inside parentheses.</th>
   </tr>
   <tr>
<td>

    $foo = (int)'42';

</td>
<td>

    $foo = ( int )'42';

</td>
   </tr>
  </table>

## Object Operator Spacing
The object operator (-&gt;) should not have any space around it.
  <table>
   <tr>
    <th>Valid: No spaces around the object operator.</th>
    <th>Invalid: Whitespace surrounding the object operator.</th>
   </tr>
   <tr>
<td>

    $foo->bar();

</td>
<td>

    $foo -> bar();

</td>
   </tr>
  </table>

## Scope Closing Brace
Indentation of a closing brace must match the indentation of the line containing the opening brace.
  <table>
   <tr>
    <th>Valid: Closing brace aligned with line containing opening brace.</th>
    <th>Invalid: Closing brace misaligned with line containing opening brace.</th>
   </tr>
   <tr>
<td>

    function foo()
    {
    }
    
    if (!class_exists('Foo')) {
        class Foo {
        }
    }
    
    <?php if ($something) { ?>
        <span>some output</span>
    <?php } ?>

</td>
<td>

    function foo()
    {
     }
    
    if (!class_exists('Foo')) {
        class Foo {
    }
        }
    
    <?php if ($something) { ?>
        <span>some output</span>
     <?php } ?>

</td>
   </tr>
  </table>
Closing brace must be on a line by itself.
  <table>
   <tr>
    <th>Valid: Close brace on its own line.</th>
    <th>Invalid: Close brace on a line containing other code.</th>
   </tr>
   <tr>
<td>

    enum Foo {
    }

</td>
<td>

    enum Foo {}

</td>
   </tr>
  </table>

## Scope Keyword Spacing
The PHP keywords static, public, private, and protected should have one space after them.
  <table>
   <tr>
    <th>Valid: A single space following the keywords.</th>
    <th>Invalid: Multiple spaces following the keywords.</th>
   </tr>
   <tr>
<td>

    public static function foo()
    {
    }

</td>
<td>

    public  static  function foo()
    {
    }

</td>
   </tr>
  </table>

## Semicolon Spacing
Semicolons should not have spaces before them.
  <table>
   <tr>
    <th>Valid: No space before the semicolon.</th>
    <th>Invalid: Space before the semicolon.</th>
   </tr>
   <tr>
<td>

    echo "hi";

</td>
<td>

    echo "hi" ;

</td>
   </tr>
  </table>

## Superfluous Whitespace
There should be no superfluous whitespace at the start of a file.
  <table>
   <tr>
    <th>Valid: No whitespace preceding first content in file.</th>
    <th>Invalid: Whitespace used before content in file.</th>
   </tr>
   <tr>
<td>

    <?php
    echo 'opening PHP tag at start of file';

</td>
<td>

            
    <?php
    echo 'whitespace before opening PHP tag';

</td>
   </tr>
  </table>
There should be no trailing whitespace at the end of lines.
  <table>
   <tr>
    <th>Valid: No whitespace found at end of line.</th>
    <th>Invalid: Whitespace found at end of line.</th>
   </tr>
   <tr>
<td>

    echo 'semicolon followed by new line char';

</td>
<td>

    echo 'trailing spaces after semicolon';   

</td>
   </tr>
  </table>
There should be no consecutive blank lines in functions.
  <table>
   <tr>
    <th>Valid: Functions do not contain multiple empty lines in a row.</th>
    <th>Invalid: Functions contain multiple empty lines in a row.</th>
   </tr>
   <tr>
<td>

    function myFunction()
    {
        echo 'code here';
    
        echo 'code here';
    }

</td>
<td>

    function myFunction()
    {
        echo 'code here';
        
    
        echo 'code here';
    }

</td>
   </tr>
  </table>
There should be no superfluous whitespace after the final closing PHP tag in a file.
  <table>
   <tr>
    <th>Valid: A single new line appears after the last content in the file.</th>
    <th>Invalid: Multiple new lines appear after the last content in the file.</th>
   </tr>
   <tr>
<td>

    function myFunction()
    {
        echo 'Closing PHP tag, then';
        echo 'Single new line char, then EOF';
    }
    
    ?>
    

</td>
<td>

    function myFunction()
    {
        echo 'Closing PHP tag, then';
        echo 'Multiple new line chars, then EOF';
    }
    
    ?>
    
    

</td>
   </tr>
  </table>

## Strict Types Declaration
When declaring strict types you should not put whitespace around the opening bracket or before the closing bracket.
  <table>
   <tr>
    <th>Valid: No spaces around brackets.</th>
    <th>Invalid: Spaces around brackets.</th>
   </tr>
   <tr>
<td>

    declare(strict_types=1);

</td>
<td>

    declare( strict_types=1 );

</td>
   </tr>
  </table>

## Multiple Empty Lines
Multiple consecutive newlines in a file are not allowed.
Documentation generated on Sun, 08 Dec 2024 13:36:56 +0100 by [PHP_CodeSniffer 3.11.1](https://github.com/PHPCSStandards/PHP_CodeSniffer)
