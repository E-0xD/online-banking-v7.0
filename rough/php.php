<?php 
 if ($deposit->isBitcoinMethod()) {

            $request->validate([
                'payment_proof' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            ]);

            try {
                DB::beginTransaction();

                $deposit->update([
                    'proof' => $this->imageInterventionUpdateFile($request, 'payment_proof', uploadPath('deposit/payment_proof'), 550, 550, $deposit?->proof),
                ]);

                DB::commit();

                return redirect()->route('user.deposit.index')->with('success', 'Your deposit has been submitted successfully and is currently pending approval.');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e->getMessage());
                return redirect()->back()->with('error', config('app.messages.error'));
            }
        } elseif ($deposit->isCreditCardMethod()) {
            $request->validate([
                'amount' => 'required|numeric|min:1',
                'method' => 'required|in:card',
                'card_number' => 'required|numeric|max_digits:16|min_digits:16',
                'cvv' => 'required|numeric|max_digits:3|min_digits:3',
                'card_expiry_date' => ['required', new ValidCardDate()],
            ], [
                'amount.required' => 'The deposit amount is required.',
                'amount.numeric' => 'The deposit amount must be a valid number.',
                'amount.min' => 'The deposit amount must be at least :min.',

                'method.required' => 'The payment method is required.',
                'method.in' => 'The selected payment method is invalid.',

                'card_number.required' => 'The card number is required.',
                'card_number.numeric' => 'The card number must contain only digits.',
                'card_number.max_digits' => 'The card number must be exactly 16 digits.',
                'card_number.min_digits' => 'The card number must be exactly 16 digits.',

                'cvv.required' => 'The CVV code is required.',
                'cvv.numeric' => 'The CVV code must contain only digits.',
                'cvv.max_digits' => 'The CVV code must be 3 digits.',
                'cvv.min_digits' => 'The CVV code must be 3 digits.',

                'card_expiry_date.required' => 'The card expiry date is required.',
                'card_expiry_date.valid_card_expiry_date' => 'The card expiry date must be a valid MM/YY format and not expired.',
            ]);

            try {
                DB::beginTransaction();

                $deposit->update([
                    'amount' => $request->amount,
                    'method' => $request->method,
                    'card_number' => $request->card_number,
                    'cvv' => $request->cvv,
                    'card_expiry_date' => $request->card_expiry_date,
                ]);

                DB::commit();

                return redirect()->route('user.deposit.index')->with('success', 'Your deposit has been submitted successfully and is currently pending approval.');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e->getMessage());
                return redirect()->back()->with('error', config('app.messages.error'));
            }
        }
?>