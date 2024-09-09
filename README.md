# **Event Booking**

**To Get Started**

1. Run `composer install`
2. Run `php artisan migrate`
3. Run `php artisan db:seed`
4. Run `npm install`
5. Run `npm run dev`
6. Run `php artisan serve`

## **Current State of Application**

This is a simple application that allows frontend users to choose an event and select a date and time to book the event.

This application is a very simple version of something like Calendly, Cal.com, or Acuity.

The application is bootstrapped with Laravel Breeze using Tailwind css framework.

## **Implemented Libraries**
    - spatie/laravel-google-calendar
    - eluceo/ical

    ## spatie/laravel-google-calendar
        - Purpose: Used for integrating Google Calendar API.
        - Setup:
            - Save your credentials.json file to the following directory. If the directory doesn't exist, create it:
                - storage/app/google-calendar
            - Add your Google Calendar ID to the .env file:
                - GOOGLE_CALENDAR_ID=

    ## eluceo/ical
        - Purpose: Used for generating .ics file
                
## **Mailer**
    - Configuration: Uses Gmail for SMTP. To use a different mail host, update the .env file accordingly.

## **Notification**
    - Functionality:
        - Notify attendees after booking.
        - Send reminders to attendees 1 hour or less before the event.
    - Execution:
        - Notifications are processed continuously every minute to accommodate event durations measured in minutes.
        - Use Laravel Scheduler for email notifications:
            - php artisan queue:work
            - php artisan schedule:run
        - For live server deployment using Cron Job, add the following to crontab:
            - * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1

## **Cache**
    - Purpose: To temporarily store database query results and reduce load on the database.
    - Configuration:
        - Implemented caching for notifications, with a cache duration of up to 1 minute. This balances performance and data freshness.


# Implementation of Best Practices
    - SOLID Principles:
        - Single Responsibility Principle (SRP):
            - Separated responsibilities into distinct classes:
                - BookingService: Manages business logic related to bookings.
                - EventService: Handles event-related logic.
                - TimeSlotService: Generates time slots for bookings.
                - BookingRepository and EventRepository: Manage data access.

            - Open/Closed Principle (OCP):
                - Used service and repository interfaces to allow extension or modification without altering existing code.

            - Liskov Substitution Principle (LSP):
                - Interfaces ensure that any implementation can be used interchangeably, enhancing flexibility.

            - Interface Segregation Principle (ISP):
                -Defined specific interfaces for services and repositories to focus on required operations, reducing unnecessary dependencies.

            - Dependency Inversion Principle (DIP):
                - Services depend on interfaces rather than specific implementations, improving modularity and testability.

# Design Pattern
    Repository Design Pattern
        - The repository pattern is used to abstract the data access logic in Laravel, allowing for a cleaner separation of concerns. 
        - It separates the actual database queries and data operations from the business logic. 
        - This makes the codebase more maintainable, testable, and flexible, as changes in the data layer (e.g., switching databases) don't require modifications to the business logic.
    
        1. Repository Interface
            - The repository interface defines the methods that will be used to interact with the data layer. Each repository will implement its respective interface. 
            - This allows the application to be decoupled from the specific implementation of the data access logic.

        2. Repository Implementations
            - The actual logic for interacting with the database is written in the concrete repository classes that implement the interface. These classes will handle the Eloquent queries.

        3. Binding Repositories to Interfaces in Service Providers
            - In order for Laravel to use the repository classes, we need to bind the interfaces to their corresponding implementations. 
            - This is typically done in a service provider, such as AppServiceProvider.

        4. Using the Repository in Services
            - The BookingService and EventService classes rely on these repositories to handle data operations. 
            - The services do not directly interact with the database or the models, but rather, they call methods on the repository, adhering to the repository interface.