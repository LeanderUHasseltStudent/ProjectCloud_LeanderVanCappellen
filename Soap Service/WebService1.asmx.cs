using MySql.Data.MySqlClient;
using System;
using System.Collections;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Services;

namespace Soap_Sevice
{
    /// <summary>
    /// Summary description for WebService1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class WebService1 : System.Web.Services.WebService
    {

        [WebMethod]
        public int getDuikuren(int user)
        {
            string connStr = "server=divebooks.cid0f56mtjtw.us-east-2.rds.amazonaws.com;user=admin;database=divebooks;password=TaakCloud;port=3306";
            MySqlConnection conn = new MySqlConnection(connStr);
            int results = 0;
            try
            {
                conn.Open();
                string sql = "SELECT duur FROM dives WHERE user_id = " + user;
                MySqlCommand cmd = new MySqlCommand(sql, conn);
                MySqlDataReader rdr = cmd.ExecuteReader();

                while (rdr.Read())
                {
                    int x = (int)rdr["duur"];
                    results = results + x;
                }
                rdr.Close();
            }
            catch (Exception ex)
            {
            }
            conn.Close();
            return results;
        }

        [WebMethod]
        public int getAantalDuiken(int user)
        {
            string connStr = "server=divebooks.cid0f56mtjtw.us-east-2.rds.amazonaws.com;user=admin;database=divebooks;password=TaakCloud;port=3306";
            MySqlConnection conn = new MySqlConnection(connStr);
            int results = 0;
            try
            {
                conn.Open();
                string sql = "SELECT * FROM dives WHERE user_id = " + user;
                MySqlCommand cmd = new MySqlCommand(sql, conn);
                MySqlDataReader rdr = cmd.ExecuteReader();

                while (rdr.Read())
                {
                    results = results + 1;
                }
                rdr.Close();
            }
            catch (Exception ex)
            {
            }
            conn.Close();
            return results;
        }
    }
}
