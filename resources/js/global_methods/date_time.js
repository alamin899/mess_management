
export default {
        methods: {
            showDateFormateInView(date,format='YYYY-MM-DD')
            {
                return moment(date).format(format)
            },
            showOnlyTime(date,format = 'LT')
            {
                return moment(date).format(format)
            },
            showDateTime(date)
            {
                var onlyDate = moment(date).format('YYYY-MM-DD')
                var onlyTime = moment(date).format('HH:mm:ss')
                return onlyDate+'T'+onlyTime
            },

            //Moment-Start-End-Date-Of-Day-Month-Year
            startDate(amount=0,dayMonthYear)   //dayMonthYear this is any type string like 'day'|'month'|'year  , how many day/month/year
            {
                return  moment().subtract(amount,dayMonthYear).startOf(dayMonthYear).format('YYYY-MM-DD')
            },
            endDate(amount=0,dayMonthYear)
            {
                if (amount>0)
                {
                        return  moment().subtract(1,dayMonthYear).endOf(dayMonthYear).format('YYYY-MM-DD')
                }
                else {
                        return  moment().subtract(amount,dayMonthYear).endOf(dayMonthYear).format('YYYY-MM-DD')
                    }
            },
            getMonthName(month)
            {
                return this.months[month-1]
            },

            getDateMonthly(date , monthNumber = 0 , format='YYYY-MM-DD')   //from date how many number of month want to get if number 2 and date 2021-04-31 result will 2021-06-31
            {
                return moment(date).add(monthNumber, 'M').format(format);
            },
            getDateDaily(date , dayNumber = 0 , format='YYYY-MM-DD')   //from date how many number of month want to get if number 2 and date 2021-04-31 result will 2021-06-31
            {
                return moment(date).add(dayNumber, 'd').format(format);
            }
        },
    };
