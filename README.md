# Doctor Who Patient Database Setup Scripts

A set of one-off PHP scripts that build out the `doctorwho` database: creating the patient, billing, and medications tables, and seeding the patient table with sample data.

## Files

- **addPatient.php** - creates the `addPatient` table (patient ID, name, date of birth, address, marital status, gender, phone number).
- **getPatient.php** - inserts five sample patient records into `addPatient` (John Doe, Jane Doe, Mary Smith, George Washington, Myra Mains).
- **billing.php** - creates the `Billing` table, linked to `addPatient` through a `PatientID` foreign key. Tracks amount billed, amount paid, date paid, and insurance provider.
- **medications.php** - creates the `Medications` table, also linked to `addPatient` through `PatientID`. Tracks medication name, dosage, quantity, and date dispensed.

Each file is standalone and runs its own database connection. There's no shared connection file in this set (unlike the Week 6 lab, which pulled the connection into its own `dbh.php`).

## Run order

Because `Billing` and `Medications` both have a foreign key back to `addPatient`, run the scripts in this order:

1. `addPatient.php` - creates the patient table
2. `getPatient.php` - populates it with sample patients
3. `billing.php` - creates the billing table
4. `medications.php` - creates the medications table

Running `billing.php` or `medications.php` before `addPatient.php` exists will fail on the foreign key constraint.

## Requirements

- PHP with the `mysqli` extension enabled
- A MySQL server reachable at `localhost`
- A database named `doctorwho` already created, with a user that has permission to create tables and insert data in it

## Setup

Each script connects with the same credentials hardcoded at the top:

```php
$servername = "localhost";
$username = "helper";
$password = "feelBetter";
$dbname = "doctorwho";
```

Update these in all four files if your database user, host, or database name differs.

## Usage

Run each script once, in the order above, through a PHP-enabled server or CLI, for example:

```
php addPatient.php
php getPatient.php
php billing.php
php medications.php
```

Each one echoes back whether its table was created (or records inserted) successfully, or the specific database error if not.

## Notes and known limitations

- These are meant to be run once each to set up the schema and seed data. Running `addPatient.php` or the other table-creation scripts a second time will fail since the tables already exist, and running `getPatient.php` again will just add duplicate sample patients.
- The database password is hardcoded and visible in plain text in every file. That's workable for a local class lab, but this should never be committed like this to a public repo or used outside a local/training environment, in a real project these values belong in an environment file kept out of version control.
- No input validation is needed here since there's no user-facing input, everything is fixed sample data, but if these tables are later built into forms that accept outside input, switch to prepared statements rather than raw SQL strings.
- `getPatient.php` uses `mysqli_multi_query()` to run all five inserts in one call. If one insert in the batch fails, the error message only shows the full combined SQL string rather than pinpointing which insert failed.
