# Symfony Challenge
Experimenting with how much I can learn about a new framework in the span of an average workday

### The Challenge
The goal of this challenge is to see how much I can learn about and implement a new web framework in the span of the an average workday.

### Parameters of the Challenge
I'll be using the Symfony framework to build a small web application over the course of ~8-10 hours (with breaks for food, bathroom, etc.) -- it's meant to simulate what I could accomplish if I was sitting down on day one at a new company with a stack I haven't used before. Though I've used PHP in the past, that was quite some time ago, and I haven't done any modern PHP development recently. I don't even have a LAMP stack set up locally, so this challenge also includes getting the appropriate dev environment up and running.

### What I'm Building
I'm building -- surprise, surprise -- an edtech tool. Back in high school, I built these cool game theory simulators for use in the classroom, but I lost the code a long time ago (and it probably wasn't written very well to begin with). I think it would be reasonable for me to recreate one of these simulations in the given time frame. We'll see what happens 😊

Let's get to it!

----

### How the site works
Teachers can sign up and create games (play sessions) for use in their classrooms. They are given a unique code that students can use to join the game. Students do not have accounts, but teachers do. This is because games need to be associated with accounts for security reasons (otherwise, students could navigate to the game admin page and screw with the game).

Currently, I'm only planning to put one game type in here for now. However, I'm building this with the assumption that in the future I would add more game types. I'm building it so only minimal refactoring would be needed (e.g. checking the database for a game type associated with the gameID, and then looking for the views associated with that game type).

The game type I'm currently adding is called the Public Goods Game. You can read more about it here: https://en.wikipedia.org/wiki/Public_goods_game
