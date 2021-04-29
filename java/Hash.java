import java.util.HashMap;
import java.util.HashSet;
import java.util.ArrayList;

class Hash{
    public static void main(String[] xargs){
        int[] nums = {1,1,2,3,3,3};
        HashMap<Integer, Integer> map = new HashMap<Integer, Integer>();
        System.out.println(nums.length);
        for(int i=0; i<nums.length; i++){
            int val = map.getOrDefault(nums[i], 0);
            val++;
            map.put(nums[i], val);
        }
        System.out.println(map);
        HashSet<Integer> set = new HashSet<Integer>();
        for(int i=0; i<nums.length; i++){
            set.add(nums[i]);
        }
        System.out.println(set);
        ArrayList<String> arrayList = new ArrayList<String>();
        arrayList.add("dvd");
        arrayList.add("vcd");
        arrayList.add("d");
        System.out.println(arrayList);
    }
}