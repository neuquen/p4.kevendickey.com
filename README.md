p4.kevendickey.com
==================

Summary
-------

I decided to do a scaled-down budget calculator which keeps track of the two most
important financial indicators: income and expenses.  When a user first goes
to the website they are met with a login/signup screen where they have the
option of signing up or logging in.  Once in, the user will be able to enter
their income based on various different sources as well as their expenses.
As they enter income and expenses I have two visual charts which will show
the user how they are doing.  There is a progress bar that calculates its
size depending on the totals, as well as a pie chart which gives a visual
representation of each expense.

**Current Features:**
- Sign up
- Log in/Log out
- Add and save total income
- Add and save total and individual expenses
- Clear income/expenses
- See visual representation of totals/expenses (progress bar)
- See visual representation of expenses breakdown (pie chart)


JavaScript
----------

I wanted to heavily focus on JavaScript.  At work they want me to do more front-end
web development so I felt like this would be a great place to learn.  When a user
enters a value, I wanted something to happen immediately, without the page reloading.
So I relied on AJAX to submit the data and then inject the result onto the page.
Therefore, everything on the page will change dynamically without having to refresh
the page.  I felt like it was a major win for me, and unfortunately I didn't get
as many front-end features in, but on the back-end I was able to accomplish my goal.

Future Plans
------------

I decided to scale-down because I didn't want to bite off more than I could chew, 
however, my goal was to start small, and get bigger and bigger.  Unfortunately,
this is as far as I got before I needed to turn the project in, but I plan on
adding new features such as:

- Edit or clear individual expenses (probably the former)
- Add/remove income and expenses fields or have the ability to edit the current ones
- Give the user the ability to rearrange the expenses/income fields in order of 
preference or importance
- Find a pie chart with more features (I used Chart.js and it isn't enough)
- Creating a dashboard with multiple different charts to display summary info
- Creating a goals page where the user can input income/expenses and goals for
how they would like to spend.  I know this would kind of ruin my whole dynamic
charts idea, but I feel like it's a more scalable approach.
- **A calendar feature which allows you to keep track of your finances from 
month-to-month.** It might be tough to implement, but it's sorely needed.
