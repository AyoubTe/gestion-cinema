
# Cinema Management System

![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)

This project is a Cinema Management System developed using Java EE (JEE) technologies, with a backend implemented in Spring Boot and a frontend in Angular. It provides functionalities for managing cinemas, theaters, movies, projections, ticket sales, and more.

## Features

- **Cinema Management:** Create, update, and delete cinemas. View cinema details.
- **Theater and Seat Management:** Manage theaters within cinemas, including seat arrangements.
- **Movie Management:** Add, edit, and remove movies. Categorize movies.
- **Projection Management:** Schedule movie projections in theaters.
- **Ticket Sales:** Sell tickets for movie projections.
- **Security:** Secure authentication and authorization using Spring Security and JSON Web Tokens (JWT).

## Technologies Used

- Backend:
  - Spring Boot
  - Spring Data JPA
  - Hibernate
  - Spring Security
  - JSON Web Tokens (JWT)
  
- Frontend:
  - Angular
  - Angular Material
  
- Database:
  - MySQL, PostgreSQL, or other supported databases
  
## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- Java Development Kit (JDK)
- Node.js and npm
- Angular CLI
- MySQL or PostgreSQL database

### Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/AyoubTe/gestion-cinema.git
   ```

2. **Backend setup:**

   - Navigate to the `backend` directory.
   - Configure your database connection in `application.properties`.
   - Run the Spring Boot application:

     ```bash
     ./mvnw spring-boot:run
     ```

3. **Frontend setup:**

   - Navigate to the `frontend` directory.
   - Install dependencies:

     ```bash
     npm install
     ```
   
   - Run the Angular application:

     ```bash
     ng serve
     ```

4. **Access the application:**

   - Open your browser and go to `http://localhost:4200`.

## Usage

- Use the frontend UI to navigate through different sections of the application (cinemas, theaters, movies, etc.).
- Perform CRUD operations on cinemas, theaters, movies, and projections.
- Manage ticket sales and view reports.

## Contributing

If you'd like to contribute to this project, please follow the [Contribution Guidelines](CONTRIBUTING.md).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- [Spring Boot](https://spring.io/projects/spring-boot)
- [Angular](https://angular.io/)
- [Spring Security](https://spring.io/projects/spring-security)
