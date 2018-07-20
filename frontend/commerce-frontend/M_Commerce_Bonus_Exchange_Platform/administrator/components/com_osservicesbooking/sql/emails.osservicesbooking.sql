INSERT INTO `#__app_sch_emails` (`id`, `email_key`, `email_subject`, `email_content`) VALUES
(1, 'booking_reminder', 'Booking Reminder', '<p>You''ve just made a booking.</p>\r\n<p>Personal details:Name: {Name}</p>\r\n<p>E-Mail: {Email}Phone: {Phone}</p>\r\n<p>Country: {Country}</p>\r\n<p>City: {City}</p>\r\n<p>State: {State}Zip: {Zip}</p>\r\n<p>Address: {Address}Notes: {Notes}</p>\r\n<p>Booking details:Booking ID: {BookingID}</p>\r\n<p>Services: {Services}Deposit: {Deposit}</p>\r\n<p>Total: {Total}Tax: {Tax}</p>\r\n<p>If you want to cancel your booking follow next link: {CancelURL}</p>\r\n<p>Thank you, we will contact you ASAP.</p>'),
(2, 'confirmation_email', 'Confirmation message\r\n', '<p>You''ve just made a booking.<br /><br />Personal details:<br />Name: {Name}<br />E-Mail: {Email}<br />Phone: {Phone}<br />Country: {Country}<br />City: {City}<br />State: {State}<br />Zip: {Zip}<br />Address: {Address}<br />Notes: {Notes}<br /><br />Booking details:<br />Booking ID: {BookingID}<br />Services: {Services}<br />Deposit: {Deposit}<br />Total: {Total}<br />Tax: {Tax}<br /><br />If you want to cancel your booking follow next link: {CancelURL}<br /><br />Thank you, we will contact you ASAP.</p>'),
(3, 'payment_message', 'Payment message', '<p>You''ve just made a booking.<br /><br />Personal details:<br />Name: {Name}<br />E-Mail: {Email}<br />Phone: {Phone}<br />Country: {Country}<br />State: {State}<br />Zip: {Zip}<br />Address: {Address}<br />Notes: {Notes}<br /><br />Booking details:<br />Booking ID: {BookingID}<br />Services: {Services}<br />Deposit: {Deposit}<br />Total: {Total}<br />Tax: {Tax}<br /><br />If you want to cancel your booking follow next link: {CancelURL}<br /><br />Thank you, we will contact you ASAP.</p>'),
(4, 'employee_notification', 'New booking', '<p>One customer has booked your for one service<br /><br />Personal details:<br />Name: {Name}<br />E-Mail: {Email}<br />Phone: {Phone}<br />Country: {Country}<br />State: {State}<br />Zip: {Zip}<br />Address: {Address}<br /><br />Booking details:<br />Services: {Services}<br />Start time: {Starttime}<br />End time: {Endtime}</p>\r\n<p>Booking date: {Bookingdate}</p>'),
(5, 'admin_notification', 'New booking from your site', '<p>New service booking from your site<br /><br />Personal details:<br />Name: {Name}<br />E-Mail: {Email}<br />Phone: {Phone}<br />Country: {Country}<br />City: {City}<br />State: {State}<br />Zip: {Zip}<br />Address: {Address}<br />Notes: {Notes}<br /><br />Booking details:<br />Booking ID: {BookingID}<br />Services: {Services}<br />Deposit: {Deposit}<br />Total: {Total}<br />Tax: {Tax}<br /><br /></p>'),
(6, 'admin_order_cancelled', 'Order has been removed', '<p>An order has been cancelled<br /><br />Personal details:<br />Name: {Name}<br />E-Mail: {Email}<br />Phone: {Phone}<br />Country: {Country}<br />City: {City}<br />State: {State}<br />Zip: {Zip}<br />Address: {Address}<br />Notes: {Notes}<br /><br />Booking details:<br />Booking ID: {BookingID}<br />Services: {Services}<br />Deposit: {Deposit}<br />Total: {Total}<br />Tax: {Tax}</p>'),
(7, 'employee_order_cancelled', 'Order has been removed', '<p>One customer has cancelled his(her) booking for one service<br /><br />Personal details:<br />Name: {Name}<br />E-Mail: {Email}<br />Phone: {Phone}<br />Country: {Country}<br />State: {State}<br />Zip: {Zip}<br />Address: {Address}<br /><br />Booking details:<br />Services: {Services}<br />Start time: {Starttime}<br />End time: {Endtime}</p>\r\n<p>Booking date: {Bookingdate}</p>'),
(8, 'order_status_changed_to_customer', 'Your Order status has been changed', '<p>Your Order status has been changed to {new_status}</p>\r\n<p>Booking details:<br />Booking ID: {BookingID}<br />Services: {Services}</p>\r\n<p>Thanks</p>\r\n<p>Dam</p>'),
(9, 'order_status_changed_to_employee', 'Order status has been changed', '<p>Order status has been changed<br /><br />Personal details:<br />Name: {Name}<br />E-Mail: {Email}<br />Phone: {Phone}<br />Country: {Country}<br />State: {State}<br />Zip: {Zip}<br />Address: {Address}<br /><br />Booking details:<br />Services: {Services}<br />Start time: {Starttime}<br />End time: {Endtime}</p>\r\n<p>Booking date: {Bookingdate}</p>\r\n<p>New status: {newstatus}</p>\r\n<p>Thanks</p>');