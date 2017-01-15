package com.example.timnas;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import android.app.ListActivity;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.widget.ListAdapter;
import android.widget.SimpleAdapter;

public class user extends ListActivity {

    JSONKonverter jsonParser = new JSONKonverter();
    ArrayList<HashMap<String, String>> userList;
    JSONArray user = null;
    private static final String DATA_URL = "http://10.0.2.2/fpandroid/json-webservice/webservice/json_event.php";
    private static final String TAG_USER = "User";
    private static final String TAG_USERNAME = "userName";
    private static final String TAG_USERPROFESSION = "userProfession";

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.user);
        userList = new ArrayList<HashMap<String, String>>();
        new LoadData().execute();
    }

    class LoadData extends AsyncTask<String, String, String> {
        protected String doInBackground(String... args) {
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            JSONObject json = jsonParser.makeHttpRequest(DATA_URL, "GET", params);
            Log.d("Data JSON: ", json.toString());
            try {
                user = json.getJSONArray(TAG_USER);
                for (int i = 0; i < user.length(); i++) {
                    JSONObject c = user.getJSONObject(i);
                    String userName = c.getString(TAG_USERNAME);
                    String userProfession = c.getString(TAG_USERPROFESSION);
                    HashMap<String, String> map = new HashMap<String, String>();
                    map.put(TAG_USERNAME, userName);
                    map.put(TAG_USERPROFESSION, userProfession);
                    userList.add(map);
                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
            return null;
        }

        protected void onPostExecute(String file_url) {
            runOnUiThread(new Runnable() {
                public void run() {
                    ListAdapter adapter = new SimpleAdapter(
                            user.this, userList, R.layout.user_item,
                            new String[] { TAG_USERNAME, TAG_USERPROFESSION},
                            new int[] { R.id.userName, R.id.userProfession});
                    setListAdapter(adapter);
                }
            });
        }
    }

}
