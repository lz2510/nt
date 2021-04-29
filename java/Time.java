import java.time.LocalDate;
import java.time.LocalTime;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
public class Time{
    public static void main(String[] xargs){
        LocalDate dateObj = LocalDate.now();
        System.out.println(dateObj);
        LocalTime timeObj = LocalTime.now();
        System.out.println(timeObj);
        LocalDateTime dateTimeObj = LocalDateTime.now();
        System.out.println(dateTimeObj);
        DateTimeFormatter dateTimeFormatter = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss");
        String formatTime = dateTimeObj.format(dateTimeFormatter);
        System.out.println(formatTime);
    }
}