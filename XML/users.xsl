<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : users.xsl
    Created on : August 10, 2018, 8:45 PM
    Author     : William
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>User List</title>
            </head>
            <body>
                <h1>User List</h1>
                <hr/>
                <table border="1">
                    <tr bgcolor="#bdfbff">
                        <th>No</th>
                        <th>Type</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                    </tr>
                    <xsl:for-each select="users/user">
                        <tr>
                            <td>
                                <xsl:value-of select="position()"/>
                            </td>
                            <td>
                                <xsl:value-of select="userType"/>
                            </td>
                            <td>
                                <xsl:value-of select="userName"/>
                            </td>
                            <td>
                                <xsl:value-of select="userPassword"/>
                            </td>
                            <td>
                                <xsl:value-of select="userStatus"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
