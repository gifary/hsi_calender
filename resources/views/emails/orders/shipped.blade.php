@component('mail::message')
# Assalamualaikum {{$order_history->nama}},

Terimakasih telah melakukan pemesanan kalender HSI. Berikut detail pesanan anda.

@component('mail::table')
|        |          | 
| --------------------	|:-------------:| 
| NIP      			| {{ $order_history->nip }}      | 
| Nama      			| {{ $order_history->nama }}      | 
| Nomor WA      			| {{ $order_history->no_wa }}      | 
| Alamat      | {{ $order_history->alamat }}, {{ $city->name }},{{ $province->name }} | 
@endcomponent
<b>No. Invoice : {{ $order_history->no_invoice }}</b>
@component('mail::table')
|      QTY  							|  Nama Barang         			| Harga Satuan | Total|
| --------------------					|-----------------------		|--------------|------|
| {{ $order_history->jumlah_order }} 	| Kalender HSI 					| Rp.{{ number_format($order_history->harga_kalender,2) }}| Rp.{{ number_format($order_history->jumlah_order * $order_history->harga_kalender,2) }} |
|	| | Biaya Ongkir {{ $order_history->nama_kurir }} | Rp.{{ number_format($order_history->biaya_ongkir,2) }} |
|	| | Donasi HSI | Rp.{{ number_format($order_history->donasi_hsi,2) }} |
|	| | Kode Unik | 17 |
|	| | <b>Total</b> | Rp.{{ number_format($order_history->total,2) }} |


@endcomponent
#Intruksi Pembayaran
<p>Mohon lakukan transfer <b>Sesuai TOTAL di atas</b> ke</p>
<p>Rek. Permata Syariah Kode Bank 784</p>
<p>Norek. 410 573 5990</p>
<p><b>An. Helmy Fatkhur Rahman</b></p>
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Jazakallah khairan katsiran,<br>
Admin HSI
@endcomponent
