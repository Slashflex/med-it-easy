/** Urgence: #ff0000 => red
	Consultation: #7c7c7c => gray
	Gynécologie: #ff72db => pink
	Pediatrie: #6280ef => blue
	Certificat: #f3ff59 => yellow
	Visite à domicile: #85ff59 => green
	Suivi psychologique: #bf79ff => purple
*/

$(function () {
	let eventsServer;
	$.getJSON('index.php?action=displayEvents')
		.done(function (data) {
			eventsServer = data;
			console.log(eventsServer);
		});
	let calendar = $("#calendar").fullCalendar({
		locale: "fr",
		slotLabelFormat: ["H:mm"],
		slotDuration: '00:15:00',
		minTime: "08:00:00",
		maxTime: "19:30:00",
		defaultView: "agendaDay",
		editable: true,
		eventLimit: true,
		selectable: true,
		selectHelper: true,
		header: {
			left: "prev,next today",
			center: "title",
			right: "month,agendaWeek,agendaDay"
		},
		eventSources: [{

			events: function (start, end, timezone, callback) {
				$.getJSON('index.php?action=displayEvents')
					.done(function (doc) {
						var events = [];
						$(doc).each(function () {
							events.push({
								title: $(this).attr('title'),
								start: $(this).attr('start'), // will be parsed
								end: $(this).attr('end'),
								color: $(this).attr('color')
							});
						});
						callback(events);
					});
			}
		}],
	});
});