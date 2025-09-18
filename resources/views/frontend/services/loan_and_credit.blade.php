@extends('frontend.layouts.app')
@section('content')
    @include('frontend.sections.services.loan_and_credit.hero')
    @include('frontend.sections.services.loan_and_credit.types')
    @include('frontend.sections.services.loan_and_credit.calculator')
    @include('frontend.sections.services.loan_and_credit.application_process')
    @include('frontend.sections.services.loan_and_credit.cta')

    <script>
        function calculateLoan() {
            const loanAmount = parseFloat(document.getElementById('loanAmount').value) || 0;
            const interestRate = parseFloat(document.getElementById('interestRate').value) || 0;
            const loanTerm = parseFloat(document.getElementById('loanTerm').value) || 0;

            if (loanAmount > 0 && interestRate > 0 && loanTerm > 0) {
                const monthlyRate = interestRate / 100 / 12;
                const numberOfPayments = loanTerm * 12;

                const monthlyPayment = loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, numberOfPayments)) /
                    (Math.pow(1 + monthlyRate, numberOfPayments) - 1);

                const totalPayment = monthlyPayment * numberOfPayments;
                const totalInterest = totalPayment - loanAmount;

                document.getElementById('monthlyPayment').textContent = '$' + monthlyPayment.toFixed(2);
                document.getElementById('totalInterest').textContent = '$' + totalInterest.toFixed(2);
                document.getElementById('totalPayment').textContent = '$' + totalPayment.toFixed(2);
            }
        }
    </script>
@endsection
