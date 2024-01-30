
const Data = {
	theaters: [
		{
			id: 1,
			name_en: "Siam Pic-Ganesha",
			name_th: "โรงละครแบงก์สยามพิฆเทศ ชั้น7 สยามสแควร์วัน"
		}
	],
	zones: [
		{
			id: 1,
			name: "A",
			price: 1600
		},
		{
			id: 2,
			name: "B",
			price: 2400
		},
		{
			id: 3,
			name: "C",
			price: 3200
		},
		{
			id: 4,
			name: "D",
			price: 4000
		},
		{
			id: 5,
			name: "E",
			price: 6000
		},
		{
			id: 6,
			name: "VIP",
			price: 9000
		}
	],
	seats: [
		{
			id: 1,
			zone_id: 1,
			name: "A1",
			row: "A",
			col: 1
		},
		{
			id: 2,
			zone_id: 1,
			name: "A2",
			row: "A",
			col: 2
		}
	],
	shows: [
		{
			id: 1,
			name_en: "Dreams of The Mayfly",
			name_th: "ใครไม่ละเมอ แมงละเมอ เดอะมิวสิคัล",
			description_en: "Siam Pic-Ganesha",
			description_th: "โรงละครแบงก์สยามพิฆเทศ ชั้น7 สยามสแควร์วัน"
		}
	],

	showtimes: [
		{
			id: 1,
			theather_id: 1,
			movie_id: 1,
			date_show: "2022-10-24",
			time_begin: "2022-10-24T14:30:00",
			time_end: "2022-10-24T17:00:00"
		}
	],

	reservations: [
		{
			id: 1,
			theater_id: 1,
			show_id: 1,
			showtime_id: 1,
			is_paid: false,
			payment_date: "2022-10-24T14:30:00"
		}
	],
	reservation_seats: [
		{
			id: 1,
			zone_id: 6,
			seat_id: 1,
			price: 9000
		},
		{
			id: 2,
			zone_id: 6,
			seat_id: 2,
			price: 9000
		}
	],

	tickets: [
		{
			id: 1,
			theater_id: 1,
			show_id: 1,
			showtime_id: 1,
			zone_id: 1,
			seat_id: 1,
			price: 9000
		}
	]
}

export default Data