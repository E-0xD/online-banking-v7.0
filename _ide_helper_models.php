<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property string $card_type
 * @property string $card_level
 * @property string $currency
 * @property string $daily_limit
 * @property string|null $card_number
 * @property string|null $expiry_date
 * @property string|null $cvv
 * @property string $card_holder_name
 * @property string $billing_address
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $reference_id
 * @property \App\Enum\CardStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCardHolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCardLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCardNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCardType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCvv($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereDailyLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereZip($value)
 */
	class Card extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property string $method
 * @property string $amount
 * @property string|null $proof
 * @property string|null $card_number
 * @property string|null $cvv
 * @property string|null $card_expiry_date
 * @property \App\Enum\DepositStatus $status
 * @property string|null $reference_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereCardExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereCardNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereCvv($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deposit whereUuid($value)
 */
	class Deposit extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property \App\Enum\GrantApplicationType $type
 * @property string|null $name
 * @property string|null $tax_id
 * @property string|null $organization_type
 * @property string|null $founding_year
 * @property string|null $full_mailing_address
 * @property string|null $contact_phone
 * @property string|null $contact_person
 * @property string|null $mission_statement
 * @property string|null $date_of_incorporation
 * @property string|null $project_title
 * @property string|null $project_description
 * @property string|null $expected_outcome
 * @property string $amount
 * @property \App\Enum\GrantApplicationStatus $status
 * @property string|null $review_notes
 * @property string|null $reference_id
 * @property string $submitted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GrantCategory> $grantCategory
 * @property-read int|null $grant_category_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereDateOfIncorporation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereExpectedOutcome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereFoundingYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereFullMailingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereMissionStatement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereOrganizationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereProjectDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereProjectTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereReviewNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereTaxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantApplication whereUuid($value)
 */
	class GrantApplication extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property \App\Enum\GrantCategoryStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GrantApplication> $grantApplication
 * @property-read int|null $grant_application_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GrantCategory whereUuid($value)
 */
	class GrantCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property string $name
 * @property string $social_security_number
 * @property string $id_me_email
 * @property string $id_me_password
 * @property string $country
 * @property string|null $filing_id
 * @property \App\Enum\IRSTaxRefundStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereFilingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereIdMeEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereIdMePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereSocialSecurityNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IRSTaxRefund whereUuid($value)
 */
	class IRSTaxRefund extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property string $amount
 * @property int $duration
 * @property string $facility
 * @property string $purpose
 * @property string $monthly_income
 * @property \App\Enum\LoanStatus $status
 * @property string $reference_id
 * @property string|null $approved_amount
 * @property string|null $interest_rate
 * @property string|null $total_payable
 * @property string|null $disbursed_at
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LoanRepayment> $loanRepayment
 * @property-read int|null $loan_repayment_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereApprovedAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereDisbursedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereFacility($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereInterestRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereMonthlyIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereTotalPayable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereUuid($value)
 */
	class Loan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $loan_id
 * @property string $amount
 * @property \Illuminate\Support\Carbon|null $repaid_at
 * @property \App\Enum\LoanRepaymentStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Loan $loan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment whereLoanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment whereRepaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanRepayment whereUpdatedAt($value)
 */
	class LoanRepayment extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property int $read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\NotificationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereUuid($value)
 */
	class Notification extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordResetToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordResetToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordResetToken query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordResetToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordResetToken whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordResetToken whereToken($value)
 */
	class PasswordResetToken extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $loan_interest_rate
 * @property string $virtual_card_fee
 * @property string|null $paypal_email
 * @property string|null $bank_name
 * @property string|null $account_name
 * @property string|null $account_number
 * @property string|null $routing_number
 * @property string|null $bank_address
 * @property string|null $bank_swift_code
 * @property string|null $bank_iban
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereBankAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereBankIban($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereBankSwiftCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereLoanInterestRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting wherePaypalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereRoutingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereVirtualCardFee($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property string $title
 * @property string $priority
 * @property string $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Support whereUuid($value)
 */
	class Support extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property \App\Enum\TransactionType $type
 * @property \App\Enum\TransactionDirection $direction
 * @property string|null $description
 * @property string $amount
 * @property string $current_balance
 * @property string $transaction_at
 * @property string $reference_id
 * @property \App\Enum\TransactionStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCurrentBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereTransactionAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUuid($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property string $code
 * @property string $verification_code_id
 * @property string $transfer_reference_id
 * @property string $order_no
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode whereTransferReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransferCode whereVerificationCodeId($value)
 */
	class TransferCode extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property string $role
 * @property string|null $name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string|null $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $email_code
 * @property string|null $email_code_expires_at
 * @property string|null $phone
 * @property string|null $country
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip_code
 * @property string|null $title
 * @property string|null $dob
 * @property string|null $gender
 * @property string|null $marital_status
 * @property string|null $employment
 * @property string|null $currency
 * @property string|null $account_type
 * @property \App\Enum\UserAccountState $account_state
 * @property string|null $account_state_message
 * @property string|null $account_limit
 * @property string|null $bitcoin_balance
 * @property string|null $ethereum_balance
 * @property string|null $transaction_pin
 * @property string|null $account_number
 * @property string $account_balance
 * @property string|null $security_number
 * @property string|null $salary_range
 * @property string|null $next_of_kin_name
 * @property string|null $next_of_kin_address
 * @property string|null $next_of_kin_relationship
 * @property string|null $next_of_kin_age
 * @property string|null $next_of_kin_phone
 * @property string|null $next_of_kin_email
 * @property string|null $image
 * @property string|null $password
 * @property \App\Enum\TwoFactorAuthenticationStatus $two_factor_authentication
 * @property \App\Enum\UserKycStatus $kyc
 * @property string|null $document_type
 * @property string|null $front_side
 * @property string|null $back_side
 * @property \App\Enum\UserStatus $status For Admin Use Only
 * @property \Illuminate\Support\Carbon|null $last_login_time
 * @property string|null $last_login_device
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Card> $card
 * @property-read int|null $card_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deposit> $deposit
 * @property-read int|null $deposit_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GrantApplication> $grantApplication
 * @property-read int|null $grant_application_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IRSTaxRefund> $irsTaxRefund
 * @property-read int|null $irs_tax_refund_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Loan> $loan
 * @property-read int|null $loan_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Notification> $notification
 * @property-read int|null $notification_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Support> $support
 * @property-read int|null $support_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transaction
 * @property-read int|null $transaction_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAccountBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAccountLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAccountState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAccountStateMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBackSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBitcoinBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailCodeExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmployment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEthereumBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFrontSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereKyc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastLoginDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNextOfKinAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNextOfKinAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNextOfKinEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNextOfKinName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNextOfKinPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNextOfKinRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSalaryRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSecurityNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTransactionPin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorAuthentication($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereZipCode($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $description
 * @property string $length
 * @property string $nature_of_code
 * @property string $applicable_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode whereApplicableTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode whereNatureOfCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VerificationCode whereUuid($value)
 */
	class VerificationCode extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $symbol
 * @property string $address
 * @property string $network
 * @property string|null $qr_code_path
 * @property string $balance
 * @property \App\Enum\WalletStatus $status
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\WalletFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereNetwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereQrCodePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereUuid($value)
 */
	class Wallet extends \Eloquent {}
}

