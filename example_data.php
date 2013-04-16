INSERT INTO `e107_oweme_categories` (`c_id`, `c_name`) VALUES
(1, 'Friends'),
(2, 'Family');

INSERT INTO `e107_oweme_debtors` (`d_id`, `d_name`) VALUES
(1, 'John Doe'),
(2, 'Jane Doe');

INSERT INTO `e107_oweme_entries` (`e_id`, `e_datestamp`, `e_category`, `e_amount`, `e_description`, `e_debtor`, `e_status`) VALUES
(1, 1365544800, 1, 5.50, 'John ran out of cash for dinner.', '1', 1);
(2, 1365544800, 2, 45.00, 'Jane had problems with her ATM card.', '2', 2);

INSERT INTO `e107_oweme_statuses` (`s_id`, `s_name`, `s_icon`) VALUES
(1, 'Open', ''),
(2, 'Closed', '');